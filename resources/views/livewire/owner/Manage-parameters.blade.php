<div>
    <x-tmk.section class="mb-4 flex gap-2">
        <div class="flex-1">
            <div class="relative">
                <x-input id="search" type="text" placeholder="Filter Key or Value"
                         wire:model.live.debounce.500ms="search"
                         class="w-full shadow-md placeholder-gray-300"/>
            </div>
        </div>
        <x-button
            wire:click="newParameter()">
            New parameter
        </x-button>
    </x-tmk.section>
    <div>

        <x-tmk.section>
            <table class="text-center w-full border border-gray-300">
                <colgroup>
                    <col class="w-max">
                    <col class="w-max">
                    <col class="w-24">
                </colgroup>
                <thead>
                <tr class="bg-gray-800 text-gray-700 [&>th]:p-2 cursor-pointer">
                    <th
                        wire:click="resort('key')"
                        class="text-white">
                        <span data-tippy-content="Order by id">Key</span>
                        <x-heroicon-s-chevron-up
                            class="w-5 text-slate-400
                            {{$orderAsc ?: 'rotate-180'}}
                            {{$orderBy === 'key' ? 'inline-block' : 'hidden'}}
                            "/>
                    </th>
                    <th
                        wire:click="resort('value')"
                        class="text-white">
                        Value
                        <x-heroicon-s-chevron-up
                            class="w-5 text-slate-400
                            {{$orderAsc ?: 'rotate-180'}}
                            {{$orderBy === 'value' ? 'inline-block' : 'hidden'}}
                            "/>
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($parameters as $parameter)
                    <tr
                        wire:key="parameter_{{ $parameter->id }}"
                        class="border-t border-gray-300 [&>td]:p-2">
                        <td>{{ $parameter->key }}</td>
                        <td>{{ $parameter->value }}</td>
                        <td>
                            <div class="border border-gray-300 rounded-md overflow-hidden grid grid-cols-2 h-10">
                                <button
                                    wire:click="editParameter({{ $parameter->id }})"
                                    class="text-gray-400 hover:text-sky-100 hover:bg-sky-500 transition border-r border-gray-300">
                                    <x-phosphor-pencil-line-duotone class="inline-block w-5 h-5"/>
                                </button>
                                <button
                                    class="text-gray-400 hover:text-red-100 hover:bg-red-500 transition">
                                    <x-phosphor-trash-duotone
                                        @click="$dispatch('swal:confirm', {
                                            html: 'Delete parameter {{ $parameter->key }}?',
                                            cancelButtonText: 'NO!',
                                            confirmButtonText: 'YES DELETE THIS KEY',
                                            next: {
                                                event: 'delete-key',
                                                params: {
                                                    id: {{ $parameter->id }}
                                                }
                                            }
                                        })"
                                        class="inline-block w-5 h-5"/>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <div class="my-4">{{ $parameters->links() }}</div>
        </x-tmk.section>


        {{-- Modal --}}
        <x-dialog-modal id="parameterModal"
                        wire:model.live="showModal">
            <x-slot name="title">
                <h2>{{ is_null($form->id) ? 'New parameter' : 'Edit parameter' }}</h2>
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

                <x-label for="key" value="key" class="mt-4"/>
                <x-input id="key" type="text" step="0.01"
                         wire:model="form.key"
                         class="mt-1 block w-full"/>
                <x-label for="value" value="value" class="mt-4"/>
                <x-input id="value" type="text"
                         wire:model="form.value"
                         class="mt-1 block w-full"/>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button @click="$wire.showModal = false">Cancel</x-secondary-button>
                @if(is_null($form->id))
                <x-tmk.form.button color="success"
{{--                                   disabled="{{ $form->title ? 'false' : 'true' }}"--}}
                                   wire:click="createParameter()"
                                   class="ml-2">Save parameter
                </x-tmk.form.button>
                @else
                    <x-tmk.form.button color="info"
                                       wire:click="updateRecord({{ $form->id }})"
                                       class="ml-2">Save changes
                    </x-tmk.form.button>
                @endif
            </x-slot>
        </x-dialog-modal>
    </div>

</div>

