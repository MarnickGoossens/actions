@php use function PHPUnit\Framework\isNull; @endphp
<div>
    {{-- show preloader while fetching data in the background --}}
    <div class="fixed top-8 left-1/2 -translate-x-1/2 z-50 animate-pulse"
         wire:loading>
        <x-tmk.preloader class="primary text-white border border-lime-700 shadow-2xl">
            {{ $loading }}
        </x-tmk.preloader>
    </div>

    {{-- Filter --}}
    <div class="mb-4 flex gap-2">
        <div class="flex-1">
            <div class="relative">
                <x-input id="search" type="text" placeholder="Filter Achternaam/Voornaam Of Gestructureerde mededeling"
                         wire:model.live.debounce.500ms="search"
                         class="w-full shadow-md placeholder-gray-300"/>
                <button
                    @click="$wire.set('search', '')"
                    class="w-5 absolute right-4 top-3">
                    <x-phosphor-x/>
                </button>
            </div>
        </div>
    </div>

    <x-tmk.section>
        <div class="my-4">{{ $allPayments->links() }}</div>
        <table class="text-left w-full border border-gray-300 bg-white">
            <colgroup>
                <col class="w-44">
                <col class="w-44">
                <col class="w-44">
                <col class="w-32">
                <col class="w-60">
                <col class="w-60">
                <col class="w-auto">
            </colgroup>
            <thead>
            <tr class="primary text-white [&>th]:p-2 cursor-pointer">
                <th>Achternaam</th>
                <th>Voornaam</th>
                <th>Vak</th>
                <th>Prijs</th>
                <th wire:click="resort('date')">Datum</th>
                <th>Betalings periode</th>
                <th>Gestructureerde mededeling</th>
            </tr>
            </thead>

            <tbody>
            @foreach($allPayments as $payment)
                <tr class="border-t border-gray-300 [&>td]:p-2">
                    <td class="text-left">{{ $payment->registration->user->sur_name }}</td>
                    <td class="text-left">{{ $payment->registration->user->first_name }}</td>
                    <td class="text-left">{{ $payment->registration->course->name }}</td>
                    <td class="text-left">€ {{ $payment->price }}</td>
                    <td class="text-left">{{ $payment->date }}</td>
                    <td class="text-left">{{ $payment->registration->payment_period }} dagen</td>
                    <td class="text-left">{{ $payment->registration->structured_message }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="my-4">{{ $allPayments->links() }}</div>
    </x-tmk.section>

</div>
