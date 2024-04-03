<div>
{{--    preloader --}}
    <div class="fixed top-8 left-1/2 -translate-x-1/2 z-50 animate-pulse"
         wire:loading>
        <x-tmk.preloader class="secondary text-white border border-black shadow-2xl">
            {{ $loading }}
        </x-tmk.preloader>
    </div>

{{--    Filter--}}
    <x-tmk.section class="mb-4 flex gap-2">
        <div class="flex-1">
            <div class="relative">
                <x-input id="search" type="text" placeholder="Filter op les"
                         wire:model.live.debounce.500ms="search"
                         class="w-full shadow-md placeholder-gray-300"/>

            </div>
        </div>

{{--        knop nieuwe les--}}
        <x-button class="primary"
            wire:click="newLesson()">
            Nieuwe les
        </x-button>
    </x-tmk.section>
    <div>
        <x-tmk.section>
            <div class="my-4">{{ $lessons->links() }}</div>
            <table class="text-center w-full border border-gray-300">
                <colgroup>
                    <col class="w-24">
                    <col class="w-24">
                    <col class="w-24">
                    <col class="w-24">
                    <col class="w-24">
                    <col class="w-24">
                    <col class="w-24">
                </colgroup>
                <thead>
                <tr class="primary [&>th]:p-2">

                    <th class="text-white text-left">
                        <span>Cursus</span>
                    </th>
                    <th wire:click="resort('name')" class="text-white text-left cursor-pointer">
                        <span>Les</span>
                        <x-heroicon-s-chevron-up
                            class="w-5 text-white
                        {{$orderAsc ?: 'rotate-180'}}
                        {{$orderBy === 'name' ? 'inline-block' : 'hidden'}}
                        "/>
                    </th>
                    <th class="text-white text-left">Teacher</th>
                    <th class="text-white text-left">Duur</th>
                    <th wire:click="resort('date')" class="text-white text-left cursor-pointer">
                        <span>Datum</span>
                        <x-heroicon-s-chevron-up
                            class="w-5 text-white
                        {{$orderAsc ?: 'rotate-180'}}
                        {{$orderBy === 'date' ? 'inline-block' : 'hidden'}}
                        "/>
                    </th>
                    <th class="text-white text-left">Tijdstip</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($lessons as $lesson)
                    <tr
                        wire:key="{{ $lesson->id }}"
                        class="border-t border-gray-300 [&>td]:p-2">
                        <td class="text-left">{{ $lesson->course->name }}</td>
                        <td class="text-left">{{ $lesson->name }}</td>
                        <td>
                            @foreach($lesson->teachers as $teacher)
                                <p class="text-left">{{$teacher->user->first_name}} {{$teacher->user->sur_name}}</p>
                            @endforeach
                        </td>
                        <td class="text-left">{{ $lesson->duration }}</td>
                        <td class="text-left">{{ \Carbon\Carbon::parse($lesson->date)->format('d/m/Y')}}</td>
                        <td class="text-left">{{ \Carbon\Carbon::parse($lesson->date)->format('H:i')}}</td>

                        <td>
                        <div class="border border-gray-300 rounded-md overflow-hidden grid grid-cols-2 h-10">
                            <button wire:click="editLesson({{ $lesson->id }})"
                                    class="text-gray-400 primaryHover transition border-r border-gray-300">
                                <x-phosphor-pencil-line-duotone class="inline-block w-5 h-5"/>
                            </button>
                            <button
                                @click="$dispatch('swal:confirm', {
                                    html: 'Verwijder {{ $lesson->name }}?',
                                    cancelButtonText: 'Nee',
                                    confirmButtonText: 'Ja, verwijder de les',
                                    next: {
                                        event: 'delete-lesson',
                                    params: {
                                        id: {{ $lesson->id }}
                                        }
                                    }
                                })"
                                class="text-gray-400 hover:text-red-100 hover:bg-red-500 transition">
                                <x-phosphor-trash-duotone
                                    class="inline-block w-5 h-5"/>
                            </button>
                        </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <div class="my-4">{{ $lessons->links() }}</div>
        </x-tmk.section>


        {{-- Modal add lessons --}}
        <x-dialog-modal id="recordModal"
                        wire:model.live="showModal">
            <x-slot name="title">
                <h2>{{ is_null($form->id) ? 'Nieuwe les toevoegen' : 'Les wijzigen' }}</h2>
            </x-slot>
            <x-slot name="content">
                {{-- error messages --}}
                @if ($errors->any())
                    <x-tmk.alert type="danger">
                        <x-tmk.list>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </x-tmk.list>
                    </x-tmk.alert>
                @endif
                {{-- show only if $form->id is empty --}}
                <div class="flex flex-row gap-4 mt-4">
                    <div class="flex-1 flex-col gap-2">
                        <x-label for="name" value="Naam" class="mt-4"/>
                        <x-input id="name" type="text"
                                 wire:model="form.name"
                                 class="mt-1 block w-full"/>
                        <x-label for="course_id" value="Cursus" class="mt-4"/>
                        <x-tmk.form.select wire:model="form.course_id" id="course_id" class="block mt-1 w-full">
                            <option value="">Selecteer een cursus</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </x-tmk.form.select>
                        <x-label for="duration" value="Duur" class="mt-4"/>
                        <x-input id="duration" type="number" step="10" min="0"
                                 wire:model="form.duration"
                                 class="mt-1 block w-full"/>
                        <x-label for="date" value="Datum en uur" class="mt-4"/>
                        <x-input id="date" type="datetime-local" :min="date('Y-m-d\TH:i')"
                                 wire:model="form.date"
                                 class="mt-1 block w-full"/>
                        <h2 class="text-sm mt-5 font-bold">Leerkrachten</h2>
                        @if($teachers)
                            <table class="mt-0.5">
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->user->first_name }} {{ $teacher->user->sur_name }}</td>
                                        <td>{{$teacher->user->id}}</td>
                                        <td>
                                            <button wire:click="deleteTeacherLesson({{$teacher->user->id}})" class="text-gray-400 hover:text-red-800 transition">
                                                <x-phosphor-trash-duotone class="inline-block w-5 h-5"/>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                            <x-tmk.form.button class="primary"
                                               wire:click="newLessonTeacher({{$form->id}})"
                                               class="mt-5">Voeg leerkracht toe
                            </x-tmk.form.button>
                        @endif
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="updateTeachers()" @click="$wire.showModal = false">Annuleren</x-secondary-button>
                @if(is_null($form->id))
                <x-tmk.form.button color="success"
                                   wire:click="createLesson()"
                                   class="ml-2">Voeg nieuwe les toe
                </x-tmk.form.button>
                @else
                    <x-tmk.form.button
                                       wire:click="updateLesson({{ $form->id }})"
                                       class="ml-2 primary">Sla wijzigingen op
                    </x-tmk.form.button>
                @endif
            </x-slot>
        </x-dialog-modal>

{{--        Modal add teachers--}}
        <x-dialog-modal id="recordModal"
                        wire:model.live="showModalTeachers">
            <x-slot name="title">
                <h2>{{ is_null($formTeachers->id) ? 'Nieuwe leekracht toevoegen' : 'Leerkracht wijzigen' }}</h2>
            </x-slot>
            <x-slot name="content">
                {{-- error messages --}}
                @if ($errors->any())
                    <x-tmk.alert type="danger">
                        <x-tmk.list>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </x-tmk.list>
                    </x-tmk.alert>
                @endif
                {{-- show only if $form->id is empty --}}
                <div class="flex flex-row gap-4 mt-4">
                    <div class="flex-1 flex-col gap-2">
                        <x-tmk.form.select wire:model="formTeachers.user_id" id="user_id" class="block mt-1 w-full">
                            <option value="">Selecteer een leerkracht</option>
                            @foreach($users as $user)
                                @if($user->type_id == 3)
                                    <option value="{{ $user->id}}">{{ $user->first_name }} {{$user->sur_name}}</option>
                                @endif
                            @endforeach
                        </x-tmk.form.select>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button @click="$wire.showModalTeachers = false">Annuleren</x-secondary-button>
                @if(is_null($formTeachers->id))
                    <x-tmk.form.button
                                       wire:click="createTeacherLesson()"
                                       class="ml-2 primary">Voeg leerkracht toe
                    </x-tmk.form.button>
                @else
                    <x-tmk.form.button

                        class="ml-2 primary">Sla wijzigingen op
                    </x-tmk.form.button>
                @endif
            </x-slot>
        </x-dialog-modal>
    </div>

</div>


