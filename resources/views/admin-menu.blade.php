<x-krak-layout class="content-center">
    <div>
        <x-slot name="title">Admin menu</x-slot>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 text-center justify-center">
            <div class="max-w-sm mx-1 p-4 mt-2 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">
                    Admin CRUD
                </h5>
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Pas de gegevens aan in de databank.</p>
                <ul class="my-4 space-y-3">
                    <li>
                        <a href="{{ route('under-construction') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ms-3 whitespace-nowrap">Accounts beheren</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('manage-users') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ms-3 whitespace-nowrap">Users beheren</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ms-3 whitespace-nowrap">Cursus beheren</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('under-construction') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ms-3 whitespace-nowrap">Lessen beheren</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('under-construction') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ms-3 whitespace-nowrap">Feedbackformulier beheren</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('under-construction') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ms-3 whitespace-nowrap">Inschrijvingen beheren</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin/managePayments') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ms-3 whitespace-nowrap">Betalingen beheren</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('under-construction') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ms-3 whitespace-nowrap">Opmerkingen beheren</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="max-w-sm mx-1 mt-2 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">
                    Admin Functionaliteiten
                </h5>
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Functionaliteiten voor admins.</p>
                <ul class="my-4 space-y-3">
                    <li>
                        <a href="{{ route('under-construction') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ms-3 whitespace-nowrap">Persoonlijke korting toepassen</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('under-construction') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ms-3 whitespace-nowrap">Lijst wanbetalers bekijken</span>
                        </a>
                    </li>
                </ul>
                <h5 class="my-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">
                    Eigenaar Functionaliteiten
                </h5>
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Functionaliteiten voor de eigenaar.</p>
                <ul class="my-4 space-y-3">
                    <li>
                        <a href="{{ route('under-construction') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ms-3 whitespace-nowrap">Parameters beheren</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('under-construction') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ms-3 whitespace-nowrap">Feedback raadplegen</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('owner/locatiesBeheren') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ms-3 whitespace-nowrap">Locaties beheren</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('under-construction') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <span class="flex-1 ms-3 whitespace-nowrap">Financieel rapport bekijken</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <x-slot name="name">Nathan</x-slot>

</x-krak-layout>
