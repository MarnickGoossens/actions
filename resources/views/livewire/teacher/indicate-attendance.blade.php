<div>
    <x-tmk.section>
        <div class="my-4">{{ $registrations->links() }}</div>
        @if ($errors->any())
            <x-tmk.alert type="danger">
                <x-tmk.list>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </x-tmk.list>
            </x-tmk.alert>
        @endif
        <table class="text-center w-full border border-gray-300">
            <colgroup>
                <col class="w-2/6">
                <col class="w-2/6">
                <col class="2/6">
            </colgroup>
            <thead>
            <tr class="primary text-white [&>th]:p-2 cursor-pointer">
                <th class="text-left">
                    <span data-tippy-content="leerling">Leerling</span>
                </th>
                <th class="text-left">
                    <span data-tippy-content="aanwezigheid"></span>
                </th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @if ($registrations->isNotEmpty())
                @foreach($registrations as $registration)

                    <tr wire:key="registration-{{ $registration->id }}" class="border-t border-gray-300 [&>td]:p-2">
                        <td class="text-left">{{$registration->user->first_name}} {{$registration->user->sur_name}}</td>
                        <td class="text-left">
                            <select name="attendanceType" id="attendanceType" wire:model="attendanceTypeId">
                                @foreach($attendancesTypes as $attendanceType)
                                    <option value="{{ $attendanceType->id }}">{{ $attendanceType->name }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td class="primaryText hover:underline font-bold"><a href="#!">Geef opmerking</a></td>
                    </tr>

                @endforeach
            </tbody>
        </table>
            <div class="my-4">{{ $registrations->links() }}</div>

            @if(is_null($form->id))
                <x-tmk.form.button class="mt-5 primary" wire:click="createAttendance({{$registration->id}})">Bevestigen
                </x-tmk.form.button>
                <x-tmk.form.button class="mt-5 primary" wire:click="editAttendance({{$registration->id}})">Aanpassen
                </x-tmk.form.button>
            @else
                <x-tmk.form.button
                    wire:click="updateAttendance({{ $form->id }})"
                    class="ml-2 primary">Opslaan
                </x-tmk.form.button>
           @endif
        @else
            <td class="text-left">Er zijn nog geen leerlingen</td>
            </tbody>
            </table>
        @endif
    </x-tmk.section>

</div>
