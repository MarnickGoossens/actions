<div>
    <div class="fixed top-8 left-1/2 -translate-x-1/2 z-50 animate-pulse"
         wire:loading>
        <x-tmk.preloader class="secondary text-white border border-black shadow-2xl">
            {{ $loading }}
        </x-tmk.preloader>
    </div>

    <x-tmk.section class="mt-5">
        <div class="text-right mb-3">
            <input type="date" wire:model.live="date">
        </div>
        <div class="my-4">{{ $lessons->links() }}</div>
        <table class="text-center w-full border border-gray-300">
            <colgroup>
                <col class="w-2/12">
                <col class="w-2/12">
                <col class="w-3/12">
                <col class="w-3/12">
                <col class="w-2/12">
            </colgroup>
            <thead>
            <tr class="primary text-white [&>th]:p-2">
                <th class="text-left">
                    <span>Cursus</span>
                </th>
                <th class="text-left cursor-pointer" wire:click="resort('name')">
                    <span>Les</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-slate-400
                        {{$orderAsc ?: 'rotate-180'}}
                        {{$orderBy === 'name' ? 'inline-block' : 'hidden'}}
                        "/>
                </th>

                <th class="text-left">
                    <span>Docent</span>
                </th>
                <th class="text-left cursor-pointer" wire:click="resort('date')">
                    <span>Datum</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-slate-400
                        {{$orderAsc ?: 'rotate-180'}}
                        {{$orderBy === 'date' ? 'inline-block' : 'hidden'}}
                        "/>
                </th>
                <th></th>

            </tr>
            </thead>
            <tbody>
            @foreach($lessons as $lesson)
                <tr class="border-t border-gray-300 text-left [&>td]:p-2">
                    <td>{{$lesson->course->name}}</td>
                    <td>{{$lesson->name}}</td>
                    <td>
                        @foreach($lesson->teachers as $index => $teacher)
                            {{$teacher->user->first_name}} {{$teacher->user->sur_name}}
                            @if($index < count($lesson->teachers) - 1)
                                ,
                            @endif
                        @endforeach
                    </td>
                    <td>{{ \Carbon\Carbon::parse($lesson->date)->format('d/m/Y')}}</td>
                    <td class="primaryText hover:underline font-bold">
                        <a href="{{ route('teacher.indicateAttendance', ['lesson_id' => $lesson->id])}}">Bekijk
                            leerlingen</a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="my-4">{{ $lessons->links() }}</div>
    </x-tmk.section>
</div>
