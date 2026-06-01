{{-- resources/views/components/gestionnaire/sidebar.blade.php --}}

<aside class="fixed top-0 left-0 h-screen w-72 bg-white shadow-lg border-r z-50">

    <div class="h-20 flex items-center px-6 border-b">
        <a href="#" class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-2xl bg-orange-500 flex items-center justify-center text-white text-2xl shadow-md">
                <i class="fa-solid fa-building"></i>
            </div>

            <div>
                <h1 class="text-xl font-bold text-gray-800">
                    GEST-IMMO
                </h1>
                <p class="text-xs text-gray-500">
                    Espace Gestionnaire
                </p>
            </div>
        </a>
    </div>

    <div class="p-6 overflow-y-auto h-[calc(100vh-80px)]">

        <p class="text-xs uppercase text-gray-400 font-semibold mb-4 tracking-wider">
            Navigation
        </p>

        <ul class="space-y-3">

            <li>
                <a href="{{ route('gestionnaire.dashboard') }}"
                    class="flex items-center gap-4 px-4 py-3 rounded-2xl bg-orange-500 text-white shadow-sm">
                    <i class="fa-solid fa-chart-line text-lg"></i>
                    <span class="font-medium">
                        Dashboard
                    </span>
                </a>
            </li>

            <li>
                <a href="{{ route('gestionnaire.logement.list') }}"
                    class="flex items-center gap-4 px-4 py-3 rounded-2xl text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition duration-300">
                    <i class="fa-solid fa-house text-lg"></i>
                    <span class="font-medium">
                        Logements
                    </span>
                </a>
            </li>

            <li>
                <a href="{{ route('gestionnaire.users.list')}}"
                    class="flex items-center gap-4 px-4 py-3 rounded-2xl text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition duration-300">
                    <i class="fa-solid fa-users text-lg"></i>
                    <span class="font-medium">
                        Locataires
                    </span>
                </a>
            </li>

            <li>
                <a href="{{ route('gestionnaire.visites.index') }}"
                    class="flex items-center gap-4 px-4 py-3 rounded-2xl text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition duration-300">
                    <i class="fa-solid fa-calendar-check text-lg"></i>
                    <span class="font-medium">
                        Visites
                    </span>
                </a>
            </li>

            <li>
                <a href="{{ route('gestionnaire.contrats.index') }}"
                    class="flex items-center gap-4 px-4 py-3 rounded-2xl text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition duration-300">
                    <i class="fa-solid fa-file-contract text-lg"></i>
                    <span class="font-medium">
                        Contrats & Demandes
                    </span>
                </a>
            </li>

            <li>
                <a href="{{ route('gestionnaire.paiements.index')}}"
                    class="flex items-center gap-4 px-4 py-3 rounded-2xl text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition duration-300">
                    <i class="fa-solid fa-money-bill-wave text-lg"></i>
                    <span class="font-medium">
                        Paiements
                    </span>
                </a>
            </li>

            <li>
                <a href="#"
                    class="flex items-center gap-4 px-4 py-3 rounded-2xl text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition duration-300">
                    <i class="fa-solid fa-triangle-exclamation text-lg"></i>
                    <span class="font-medium">
                        Signalements
                    </span>
                </a>
            </li>

            <li>
                <a href="#"
                    class="flex items-center gap-4 px-4 py-3 rounded-2xl text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition duration-300">
                    <i class="fa-solid fa-chart-pie text-lg"></i>
                    <span class="font-medium">
                        Rapports
                    </span>
                </a>
            </li>

            <li>
                <a href="{{ route('gestionnaire.profile.show')}}"
                    class="flex items-center gap-4 px-4 py-3 rounded-2xl text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition duration-300">
                    <i class="fa-solid fa-user text-lg"></i>
                    <span class="font-medium">
                        Mon Profil
                    </span>
                </a>
            </li>

            @auth
                @if(auth()->user()->roles === 'admin')
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center justify-center gap-3 px-4 py-3 rounded-2xl bg-slate-800 text-white shadow-sm hover:bg-slate-900 transition duration-300 text-sm font-semibold">
                        <i class="fa-solid fa-arrow-left"></i> Retour Espace Admin
                    </a>
                </li>
                @endif
            @endauth

        </ul>

        <div class="my-8 border-t"></div>

        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center gap-3 bg-red-500 hover:bg-red-600 text-white py-3 rounded-2xl transition duration-300 shadow-sm cursor-pointer">
                <i class="fa-solid fa-right-from-bracket"></i>
                Déconnexion
            </button>
        </form>

    </div>
</aside>
