{{-- resources/views/components/locataire/sidebar.blade.php --}}

<aside class="fixed top-0 left-0 h-screen w-72 bg-white shadow-lg border-r z-50">

    <!-- LOGO -->
    <div class="h-20 flex items-center px-6 border-b">

        <a href="#" class="flex items-center gap-3">

            <!-- ICON -->
            <div class="w-12 h-12 rounded-2xl bg-orange-500 flex items-center justify-center text-white text-2xl shadow-md">

                <i class="fa-solid fa-house"></i>

            </div>

            <!-- TEXT -->
            <div>

                <h1 class="text-xl font-bold text-gray-800">
                    GEST-IMMO
                </h1>

                <p class="text-xs text-gray-500">
                    Espace Locataire
                </p>

            </div>

        </a>

    </div>

    <!-- MENU -->
    <div class="p-6 overflow-y-auto h-[calc(100vh-80px)]">

        <!-- TITLE -->
        <p class="text-xs uppercase text-gray-400 font-semibold mb-4 tracking-wider">

            Navigation

        </p>

        <ul class="space-y-3">

            <!-- DASHBOARD -->
            <li>

                <a href="{{route('dash-locataire')}}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl bg-orange-500 text-white shadow-sm">

                    <i class="fa-solid fa-chart-line text-lg"></i>

                    <span class="font-medium">
                        Dashboard
                    </span>

                </a>

            </li>

            <!-- MON LOGEMENT -->
            <li>

                <a href="{{route('locataire.logement.list')}}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition duration-300">

                    <i class="fa-solid fa-house text-lg"></i>

                    <span class="font-medium">
                        Mon Logement
                    </span>

                </a>

            </li>

            <!-- MES PAIEMENTS -->
            <li>

                <a href="{{route('locataire.paiements.index')}}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition duration-300">

                    <i class="fa-solid fa-money-bill-wave text-lg"></i>

                    <span class="font-medium">
                        Mes Paiements
                    </span>

                </a>

            </li>

            <!-- MON CONTRAT -->
            <li>

                <a href="{{ route('locataire.contrats.index')}}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition duration-300">

                    <i class="fa-solid fa-file-contract text-lg"></i>

                    <span class="font-medium">
                        Mon Contrat
                    </span>

                </a>

            </li>

            <!-- VISITES -->
            <li>

                <a href="{{route('locataire.visites.index')}}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition duration-300">

                    <i class="fa-solid fa-calendar-check text-lg"></i>

                    <span class="font-medium">
                        Mes Visites
                    </span>

                </a>

            </li>

            <!-- SIGNALEMENT -->
            <li>

                <a href="#"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition duration-300">

                    <i class="fa-solid fa-triangle-exclamation text-lg"></i>

                    <span class="font-medium">
                        Signalements
                    </span>

                </a>

            </li>

            <!-- PROFIL -->
            <li>

                <a href="{{route('locataire.profile.show')}}"
                   class="flex items-center gap-4 px-4 py-3 rounded-2xl text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition duration-300">

                    <i class="fa-solid fa-user text-lg"></i>

                    <span class="font-medium">
                        Mon Profil
                    </span>

                </a>

            </li>

            <li>
                  @auth
                @if(auth()->user()->roles === 'admin')
                <!-- Ce bouton n'apparaîtra QUE pour l'admin, même s'il visite le dashboard locataire -->
                <a href="{{ route('admin.dashboard') }}" class="bg-orange-500 text-white px-3 py-1 rounded text-sm font-semibold hover:bg-orange-600">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Retour Espace Admin
                </a>
                @endif
                @endauth
            </li>

        </ul>

        <!-- SEPARATOR -->
        <div class="my-8 border-t"></div>

        <!-- LOGOUT -->
        <form action="{{route('logout')}}" method="POST">

            @csrf

            <button type="submit"
                    class="w-full flex items-center justify-center gap-3 bg-red-500 hover:bg-red-600 text-white py-3 rounded-2xl transition duration-300 shadow-sm">

                <i class="fa-solid fa-right-from-bracket"></i>

                Déconnexion

            </button>

        </form>



    </div>

</aside>
