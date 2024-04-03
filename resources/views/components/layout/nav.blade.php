<nav class="container mx-auto p-4 flex justify-between">
    {{-- left navigation--}}
    <div class="flex items-center space-x-2">
        {{-- Logo --}}
        {{--        <a href="{{ route('home') }}">--}}
        {{--            <x-tmk.logo class="w-8 h-8"/>--}}
        {{--        </a>--}}
        <a class="hidden sm:block font-medium text-lg" href="{{ route('home') }}">
            Krak Leerplatform
        </a>
        <x-nav-link href="{{ route('under-construction') }}" :active="request()->routeIs('under-construction')">
            Agenda
        </x-nav-link>
        <x-nav-link href="{{ route('courses') }}" :active="request()->routeIs('courses')">
            Cursus
        </x-nav-link>
    </div>

    {{-- right navigation --}}
    <div class="relative flex items-center space-x-2">
        @guest()
        <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
            Login
        </x-nav-link>
        <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
            Register
        </x-nav-link>
        @endguest
            {{-- avatar --}}
            @auth()
                @if(auth()->user()->type_id == '5')
                    <x-nav-link href="{{ route('admin-menu') }}">
                        <x-fas-pencil class="w-4 h-4"/>
                    </x-nav-link>
                @endif
        @endauth


        {{-- dropdown navigation user--}}
            @auth()
        <x-dropdown align="right" width="48">
            {{-- avatar --}}
            <x-slot name="trigger">
                <img class="rounded-full h-8 w-8 cursor-pointer"
                     src="https://ui-avatars.com/api/?name={{  urlencode(auth()->user()->first_name) }}{{  urlencode(auth()->user()->sur_name) }}"
                     alt="Vinyl Shop">
            </x-slot>
            <x-slot name="content">
                {{-- all users --}}
                <div class="block px-4 py-2 text-xs text-gray-400">Welkom, {{auth()->user()->first_name}}</div>
                <x-dropdown-link href="{{ route('under-construction') }}">Agenda</x-dropdown-link>
                <x-dropdown-link href="{{ route('under-construction') }}">Cursus</x-dropdown-link>
                {{-- parents only --}}
                <div class="block px-4 py-2 text-xs text-gray-400">Ouders</div>
                <x-dropdown-link href="{{ route('under-construction') }}">Profiel bekijken</x-dropdown-link>
                <x-dropdown-link href="{{ route('under-construction') }}">Leerling inschrijven</x-dropdown-link>
                <x-dropdown-link href="{{ route('under-construction') }}">Mijn kinderen</x-dropdown-link>
                <x-dropdown-link href="{{ route('under-construction') }}">Opmerkingen</x-dropdown-link>
                <x-dropdown-link href="{{ route('under-construction') }}">Opmerking geven</x-dropdown-link>
                {{-- teacher only --}}
                <div class="block px-4 py-2 text-xs text-gray-400">Leerkrachten</div>
                <x-dropdown-link href="{{ route('under-construction') }}">Opmerkingen</x-dropdown-link>
                <x-dropdown-link href="{{ route('under-construction') }}">Opmerking geven</x-dropdown-link>
                <x-dropdown-link href="{{ route('teacher.viewClass') }}">Mijn klassen</x-dropdown-link>
                <x-dropdown-link href="{{ route('under-construction') }}">Aanwezigheden invullen</x-dropdown-link>
                <div class="block px-4 py-2 text-xs text-gray-400">Account</div>
                <x-dropdown-link href="{{ route('under-construction') }}">Dashboard</x-dropdown-link>
                <x-dropdown-link href="{{ route('profile.show') }}">Profiel beheren</x-dropdown-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link onclick="event.preventDefault(); this.closest('form').submit();">
                        Uitloggen
                    </x-dropdown-link>
                </form>

            </x-slot>
        </x-dropdown>
            @endauth
    </div>
</nav>
