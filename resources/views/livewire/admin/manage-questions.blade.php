<div class="m-5">
    {{--    <x-tmk.section>--}}

    <div class="mb-4 flex gap-2">
        <x-tmk.form.button color="primary"
                           wire:click="newQuestion()">
            Nieuwe vraag
        </x-tmk.form.button>
        <div class="grow relative">
            <x-tmk.form.input
                wire:model.live.debounce.500ms="search"
                id="search" type="text" placeholder="Vraag"
                class="w-full shadow-md placeholder-gray-300"/>
            <x-phosphor-x class="w-5 absolute right-3 top-3 cursor-pointer"
                          @click="$wire.set('search', '')"
                          wire:click="$set('search', '')"
                          class="w-5 absolute right-3 top-3 cursor-pointer {{ $search ?: 'hidden' }}"
            />
        </div>
        <div class="w-max flex">
            <div class="flex items-center gap-2">
                <x-label for="questionsType">Type</x-label>
                <x-tmk.form.select
                    wire:model.live="questionsType"
                    id="questionsType">
                    <option value="%">Alles</option>
                    <option value="geslotenVraag">Gesloten</option>
                    <option value="openVraag">Open</option>
                </x-tmk.form.select>
            </div>
        </div>

        <div class="grow"> {{--border-red-500 border--}}
            {{ $questions->links() }}
        </div>
    </div>

    <table class="mt-3 text-center w-full">
        <colgroup>
            <col class="w-20">
            <col class="w-max">
            <col class="w-36">
            <col class="w-36">
            <col class="w-36">
            <col class="w-24">
        </colgroup>
        <thead>
        <tr class="text-left [&>th]:p-2 cursor-pointer">
            <th
                wire:click="resort('id')">
                #
                <x-heroicon-s-chevron-up
                    class="w-5 primaryText
                            {{$orderAsc ?: 'rotate-180'}}
                            {{$orderBy === 'id' ? 'inline-block' : 'hidden'}}
                            "/>
            </th>
            <th
                wire:click="resort('content')">
                Vraag
                <x-heroicon-s-chevron-up
                    class="w-5 primaryText
                            {{$orderAsc ?: 'rotate-180'}}
                            {{$orderBy === 'content' ? 'inline-block' : 'hidden'}}
                            "/>
            </th>
            <th
                wire:click="resort('question_type_id')"
                class="">
                Type
                <x-heroicon-s-chevron-up
                    class="w-5 primaryText
                            {{$orderAsc ?: 'rotate-180'}}
                            {{$orderBy === 'question_type_id' ? 'inline-block' : 'hidden'}}
                            "/>
            </th>
            <th
                wire:click="resort('valid_from')">
                Geldig vanaf
                <x-heroicon-s-chevron-up
                    class="w-5 primaryText
                            {{$orderAsc ?: 'rotate-180'}}
                            {{$orderBy === 'valid_from' ? 'inline-block' : 'hidden'}}
                            "/>
            </th>
            <th
                wire:click="resort('valid_until')">
                Geldig tot
                <x-heroicon-s-chevron-up
                    class="w-5 primaryText
                            {{$orderAsc ?: 'rotate-180'}}
                            {{$orderBy === 'valid_until' ? 'inline-block' : 'hidden'}}
                            "/>
            </th>
            <th>
                Action
            </th>
        </tr>
        </thead>
        <tbody class="border-t-4 border-black">

        @foreach($questions as $question)
            <tr
                wire:key="parameter_{{ $question->id }}"
                @if(date('Y-m-d H:i:s') > $question->valid_from && date('Y-m-d') < $question->valid_until)
                    class="text-left border-t border-gray-300 [&>td]:p-2"
                @else
                    class="bg-red-100 text-left border-t border-gray-300 [&>td]:p-2"
                @endif
                >
                <td>{{ $question->id }}</td>
                <td>{{ $question->content }}</td>

                <td>
                    @foreach ($questionTypes as $questionType)
                        @if($questionType->id === $question->question_type_id)
                            {{ $questionType->name }}
                        @endif
                    @endforeach

                </td>

                <td> {{ \Carbon\Carbon::parse($question->valid_from)->format('d-m-Y') }} </td>
                <td> {{ \Carbon\Carbon::parse($question->valid_until)->format('d-m-Y') }} </td>

                <td>
                    <div class="border-2 border-black rounded-md overflow-hidden grid grid-cols-2 h-10">
                        <button
                            wire:click="editQuestion({{ $question->id }})"
                            class="bg-gray-100 text-black secondaryHover Hover hover:text-white transition border-r border-black">
                            <x-phosphor-pencil-line-duotone class="inline-block w-5 h-5"/>
                        </button>
                        <button

                            @click="$dispatch('swal:confirm', {
                                            title: 'Delete question?',
                                            icon: '{{ $question->feedback_questions_count > 0 ? 'warning' : '' }}',
                                            background: '{{ $question->feedback_questions_count > 0 ? 'error' : '' }}',
                                            html: '{{ $question->feedback_questions_count > 0 ? '<b>ATTENTION</b>: you are going to delete <b>' . $question->feedback_questions_count . ' ' . Str::plural('question', $question->feedback_questions_count) . '</b> at the same time!' :'' }}',
                                            color: '{{ $question->feedback_questions_count > 0 ? 'red' : '' }}',
                                            cancelButtonText: 'NO!',
                                            confirmButtonText: 'YES DELETE THIS QUESTION',
                                            next: {
                                                event: 'delete-question-type',
                                                params: {
                                                    id: {{ $question->id }}
                                                }
                                            }
                                        })"
                            class="bg-gray-100 text-black primaryHover Hover hover:text-white transition border-l border-black">
                            <x-phosphor-trash-duotone
                                class="inline-block w-5 h-5"/>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{--        <div class="my-4">{{ $questions->links() }}</div>--}}
    {{--    </x-tmk.section>--}}


    {{--     Modal --}}
    <x-dialog-modal id="modal"
                    wire:model.live="showModal">
        <x-slot name="title">
            <h2>{{ is_null($form->id) ? 'Vraag toevoegen' : 'Vraag bewerken' }}</h2>
        </x-slot>
        <x-slot name="content">
            @if ($errors->any())
                <x-tmk.alert type="danger">
                    <x-tmk.list>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </x-tmk.list>
                </x-tmk.alert>
            @endif
            <x-label for="question" value="Vraag" class="mt-4"/>
            <x-tmk.form.input id="question" type="text"
                              wire:model="form.content"
                              placeholder="Vraag"
                              class="mt-1 block w-full"/>

            <x-label for="type" value="Type" class="mt-3"/>
            <x-tmk.form.select id="type"
                               wire:model="form.question_type_id"
                               class="block mt-1">
                <option value="" class="text-blue-700" style="color: lightgrey;">Selecteer Type</option>
                @foreach ($questionTypes as $questionType)
                    <option value="{{ $questionType->id }}">{{ $questionType->name }}</option>
                @endforeach
            </x-tmk.form.select>

            <x-label for="validFrom" value="Geldig vanaf" class="mt-3"/>
            {{--                {{ $form->valid_from }}--}}
            <x-tmk.form.input type="date" id="validFrom"
                              wire:model="form.valid_from"/>
            <x-label for="validFrom" value="Geldig tot" class="mt-3"/>
            <x-tmk.form.input type="date" id="validFrom"
                              wire:model="form.valid_until"/>
        </x-slot>

        <x-slot name="footer" class="bg-white">
            <x-tmk.form.button
                color="gray"
                @click="$wire.showModal = false">Annuleer
            </x-tmk.form.button>
            @if(is_null($form->id))
                <x-tmk.form.button color="primary"
                                   {{--                                   disabled="{{ $form->content ? 'false' : 'true' }}"--}}
                                   wire:click="createQuestion()"
                                   class="ml-2">Voeg vraag toe
                </x-tmk.form.button>
            @else
                <x-tmk.form.button color="primary"
                                   wire:click="updateQuestion({{ $form->id }})"
                                   class="ml-2">Slaag op
                </x-tmk.form.button>
            @endif
        </x-slot>
    </x-dialog-modal>

</div>

