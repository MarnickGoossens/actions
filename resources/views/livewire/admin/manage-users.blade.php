<div>
    {{-- Filter --}}
    <x-tmk.section class="mb-4 flex gap-2">
        <div class="flex-1">
            <x-input id="search" type="text" placeholder="Zoek gebruiker met naam"
                     wire:model.live.debounce.500ms="search"
                     class="w-full shadow-md placeholder-gray-300"/>
        </div>
        <x-tmk.form.switch id="active"
                           text-off="Non-Actief"
                           color-off="bg-gray-100 before:line-through"
                           text-on="Actief"
                           color-on="text-white bg-lime-600"
                           class="w-20 h-auto" />
        <x-button wire:click="newUser()">
            Nieuwe Gebruiker
        </x-button>
    </x-tmk.section>

    {{-- Table with teachers --}}
    <x-tmk.section>
        <table class="text-center w-full border border-gray-300">
            <colgroup>
                <col class="w-24">
                <col class="w-24">
                <col class="w-24">
                <col class="w-14">
                <col class="w-24">
            </colgroup>
            <thead>
            <tr class="bg-gray-100 text-gray-700 [&>th]:p-2">
                <th>Naam</th>
                <th>Functie</th>
                <th>Telefoonnummer</th>
                <th>Email</th>
                <th>
                    <x-tmk.form.select id="perPage"
                                       wire:model.live="perPage"
                                       class="block mt-1 w-24">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </x-tmk.form.select>
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr
                    wire:key="{{ $user->id }}"
                    class="border-t border-gray-300">
                    <td>{{ $user->first_name }} {{ $user->sur_name }}</td>
                    <td>{{ $user->type->name }}</td>
                    <td>{{ $user->telephone_number }}</td>
                    <td>{{ $user->mail }}</td>
                    <td>
                        <div class="border border-gray-300 rounded-md overflow-hidden m-2 grid grid-cols-2 h-10">
                            <button
                                wire:click="editUser({{ $user->id }})"
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
            @empty
                <tr>
                    <td colspan="6" class="border-t border-gray-300 p-4 text-center text-gray-500">
                        <div class="font-bold italic text-sky-800">No records found</div>
                    </td>
                </tr>
              @endforelse
            </tbody>
        </table>
    </x-tmk.section>

    {{-- Modal for read, add and update user --}}
    <x-dialog-modal id="userModal"
                    wire:model.live="showModal">
        <x-slot name="title">
            <h2>{{ is_null($form->id) ? 'Nieuwe gebruiker' : 'Gebruiker aanpassen' }}</h2>
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
            <div class="flex flex-row gap-4 mt-4">
                <div class="flex-1 flex-col gap-2">
                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <x-label for="first_name" value="Voornaam" class="mt-4"/>
                            <x-input id="first_name" type="text"
                                     wire:model="form.first_name"
                                     class="mt-1 inline w-full"/>
                        </div>
                        <div class="w-1/2">
                            <x-label for="sur_name" value="Achternaam" class="mt-4"/>
                            <x-input id="sur_name" type="text"
                                     wire:model="form.sur_name"
                                     class="mt-1 inline w-full"/>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <x-label for="gender_id" value="Gender" class="mt-4"/>
                            <x-tmk.form.select wire:model="form.gender_id" id="gender_id" class="block mt-1 w-full">
                                <option value="">Selecteer een gender</option>
                                @foreach($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                @endforeach
                            </x-tmk.form.select>
                        </div>
                        <div class="w-1/2">
                            <x-label for="birth_date" value="Geboortedatum" class="mt-4"/>
                            <x-input id="birth_date" type="date"
                                     wire:model="form.birthdate"
                                     class="mt-1 inline w-full"/>
                        </div>

                    </div>

                    <div class="flex gap-4">
                        <div class="w-2/5">
                            <x-label for="telephone_number" value="Telefoonnummer" class="mt-4"/>
                            <x-input id="telephone_number" type="text"
                                     wire:model="form.telephone_number"
                                     class="mt-1 inline w-full"/>
                        </div>
                        <div class="w-3/5">
                            <x-label for="mail" value="E-Mail" class="mt-4"/>
                            <x-input id="mail" type="text"
                                     wire:model="form.mail"
                                     class="mt-1 inline w-full"/>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-4/5">
                            <x-label for="street_name" value="Straatnaam" class="mt-4"/>
                            <x-input id="street_name" type="text"
                                     wire:model="form.street_name"
                                     class="mt-1 inline w-full"/>
                        </div>
                        <div class="w-1/5">
                            <x-label for="house_number" value="Huisnummer" class="mt-4"/>
                            <x-input id="house_number" type="text"
                                     wire:model="form.house_number"
                                     class="mt-1 inline w-full"/>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <x-label for="city_id" value="City" class="mt-4"/>
                            <x-tmk.form.select wire:model="form.city_id" id="city_id" class="block mt-1 w-full">
                                <option value="">Select een stad</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->zipcode }} - {{ $city->name }}</option>
                                @endforeach
                            </x-tmk.form.select>
                        </div>
                        <div class="w-1/2">
                            <x-label for="type_id" value="User Type" class="mt-4"/>
                            <x-tmk.form.select wire:model="form.type_id" id="type_id" class="block mt-1 w-full">
                                <option value="">Selecteer het gebruiker type</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </x-tmk.form.select>
                        </div>
                    </div>

                    <x-label for="password" value="Wachtwoord" class="mt-4"/>
                    <x-input id="password" type="text"
                             wire:model="form.password"
                             class="mt-1 inline w-full"/>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button @click="$wire.showModal = false">Cancel</x-secondary-button>
            @if(is_null($form->id))
            <x-tmk.form.button color="success"
                               wire:click="createUser()"
                               class="ml-2">Gebruiker toevoegen
            </x-tmk.form.button>
            @else
                <x-tmk.form.button color="info"
                                   wire:click="updateUser({{ $form->id }})"
                                   class="ml-2">Wijziging opslagen
                </x-tmk.form.button>
            @endif
        </x-slot>
    </x-dialog-modal>
</div>
<x-slot name="name">Nathan</x-slot>
