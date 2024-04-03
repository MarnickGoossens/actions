<div>

    <x-tmk.section class="mb-4 flex gap-2 justify-center">


        <x-button wire:click="newCourse()" >

            new course
        </x-button>
    </x-tmk.section>

    <x-tmk.section>
        <table class="text-center w-full border border-gray-300">
            <colgroup>
                <col class="w-20">
                <col class="w-20">
                <col class="w-20">
                <col class="w-20">
                <col class="w-20">
                <col class="w-20">
                <col class="w-10">

            </colgroup>
            <thead>
            <tr class="text-gray-700 [&>th]:p-2 cursor-pointer">
                <th wire:click="resort('name')">
                    <span data-tippy-content="Order op naam">naam</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-slate-400 inline-block"/>
                </th>

                <th wire:click="resort('location->name')">
                    <span data-tippy-content="Order op locatie">locatie</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-slate-400 inline-block"/>
                </th>

                <th wire:click="resort('lesson')">
                    <span data-tippy-content="Order op lessen">lessen</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-slate-400 inline-block"/>
                </th>

                <th>
                    <span data-tippy-content="Order op docent">docent</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-slate-400 inline-block"/>
                </th>

                <th>
                    <span data-tippy-content="Order op prijs">prijs</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-slate-400 inline-block"/>
                </th>

                <th>
                    <span data-tippy-content="Order op startdatum">startdatum</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-slate-400 inline-block"/>
                </th>

                <th>

                </th>

            </tr>
            </thead>
            <tbody>
            @foreach($courses as $index => $course)
                <tr class="{{ $index % 2 == 0 ? 'bg-gray-200' : 'bg-white' }} border-t border-gray-300 [&>td]:p-2">

                    <td>{{ $course->name }}</td>

                    <td>{{ $course->location->name }}</td>

                    <td>
                        <ul>
                            @foreach($course->lessons as $lesson)
                                <li> {{  $lesson->name }}</li>
                            @endforeach
                        </ul>
                    </td>

                    <td>
                        <ul>
                            @foreach($course->lessons as $lesson)
                                @foreach($lesson->teachers as $teacher)
                                    <li> {{  $teacher->user->sur_name }} {{  $teacher->user->first_name }}</li>
                                @endforeach
                            @endforeach
                        </ul>
                    </td>

                    <td>
                        <ul>
                            @foreach($course->prices as $price)
                                <li>&euro; {{  $price->price }}</li>
                            @endforeach
                        </ul>
                    </td>



                    <td>{{ \Carbon\Carbon::parse($course->date)->format('Y-m-d') }}</td>


                    <td>
                        <div class="border border-gray-300 rounded-md overflow-hidden m-2 grid grid-cols-2 h-10">
                            <button
                                class="text-gray-400 hover:text-sky-100 hover:bg-sky-500 transition border-r border-gray-300">
                                <x-phosphor-pencil-line-duotone class="inline-block w-5 h-5"/>
                            </button>
                            <button
                                class="text-gray-400 hover:text-red-100 hover:bg-red-500 transition">
                                <x-phosphor-trash-duotone class="inline-block w-5 h-5"/>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach



            </tbody>
        </table>
    </x-tmk.section>

    <x-dialog-modal id="courseModal"
                    wire:model.live="showModal">
        <x-slot name="title">
            <h2>New Course</h2>
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

            <div class="flex flex-row gap-4 mt-4">
                <div class="flex-1 flex-col gap-2">

                    <x-label for="course" value="Curssus" class="mt-4"/>
                    <x-input id="course" type="text"
                             wire:model="form.course"
                             class="mt-1 block w-full"/>


                    <x-label for="teacher_id" value="Leerkracht" class="mt-4"/>
                    <x-tmk.form.select wire:model="form.teacher_id" id="teacher_id" class="block mt-1 w-full">
                        <option value="">Leerkracht</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->user->sur_name}}</option>
                        @endforeach
                    </x-tmk.form.select>


                    <x-label for="lesson_id" value="Les" class="mt-4"/>
                    <x-tmk.form.select wire:model="form.lesson_id" id="lesson_id" class="block mt-1 w-full">
                        <option value="">Les</option>
                        @foreach($lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->name}}</option>
                        @endforeach
                    </x-tmk.form.select>


                    <x-label for="location_id" value="Locatie" class="mt-4"/>
                    <x-tmk.form.select wire:model="form.location_id" id="location_id" class="block mt-1 w-full">
                        <option value="">Locatie</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id}}">{{ $location->name}}</option>
                        @endforeach
                    </x-tmk.form.select>



                    <x-label for="price" value="Prijs" class="mt-4"/>
                    <x-input id="price" type="number" step="0.01"
                             wire:model="form.price"
                             class="mt-1 block w-full"/>

                    <x-label for="date" value="Datum" class="mt-4"/>
                    <x-input id="date" type="date" step="0.01"
                             wire:model="form.date"
                             class="mt-1 block w-full"/>

                    <x-label for="description" value="Description" class="mt-4"/>
                    <x-input id="description" type="text" step="0.01"
                             wire:model="form.description"
                             class="mt-1 block w-full"/>

                    <x-label for="max_number" value="Maximum leerlingen" class="mt-4"/>
                    <x-input id="max_number" type="number" step="0.01"
                             wire:model="form.max_number"
                             class="mt-1 block w-full"/>

                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button @click="$wire.showModal = false">Cancel</x-secondary-button>
            <x-tmk.form.button color="success"
                               wire:click="createCourse()"
                               class="ml-2">Save new course
            </x-tmk.form.button>
        </x-slot>
    </x-dialog-modal>
</div>
