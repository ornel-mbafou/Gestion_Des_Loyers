<!-- resources/views/components/header.blade.php -->

<!-- Bar du haut -->
<div class="hidden lg:block border-b bg-white">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">

        <div class="flex items-center justify-between h-12 text-sm">

            <!-- gauche -->
            <div class="flex items-center gap-8 text-gray-600 text-sm">

                <!-- Email -->
                <div class="flex items-center gap-2">

                    <i class="fa-solid fa-envelope text-orange-500"></i>

                    <span>
                        gest-immo@gmail.com
                    </span>

                </div>

                <!-- Adresse -->
                <div class="flex items-center gap-2">

                    <i class="fa-solid fa-location-dot text-orange-500"></i>

                    <span>
                        Douala, Cameroun
                    </span>

                </div>

            </div>

            <!-- droite -->
            <div class="flex items-center gap-4">

                <a href="#"
                    class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center hover:bg-orange-500 hover:text-white transition">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

                <a href="#"
                    class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center hover:bg-orange-500 hover:text-white transition">
                    <i class="fa-brands fa-twitter"></i>
                </a>

                <a href="#"
                    class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center hover:bg-orange-500 hover:text-white transition">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>

                <a href="#"
                    class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center hover:bg-orange-500 hover:text-white transition">
                    <i class="fa-brands fa-instagram"></i>
                </a>

            </div>
        </div>

    </div>
</div>

<!-- NAVBAR -->
<nav class="bg-white shadow-md sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4 lg:px-8">

        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <a href="/" class="flex items-center gap-2">

                <!-- Icône -->
                <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center text-white">

                    <i class="fa-solid fa-house"></i>

                </div>

                <!-- Nom -->
                <div class="flex flex-col leading-tight">

                    <span class="text-xl font-bold text-gray-900">
                        GEST-IMMO
                    </span>

                    <span class="text-xs text-gray-500">
                        Gestion des loyers
                    </span>

                </div>

            </a>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex items-center gap-10 font-medium">

                <li>
                    <a href="/" class="text-orange-500">
                        Accueil
                    </a>
                </li>



                <li>
                    <a href="{{route('logement')}}"
                        class="hover:text-orange-500 transition">
                        Logements
                    </a>
                </li>


                <li>
                    <a href="{{route('apropos')}}" class="hover:text-orange-500 transition">
                        À propos
                    </a>
                </li>



                <li>
                    <a href="{{route('contact')}}"
                        class="hover:text-orange-500 transition">
                        Contact Us
                    </a>
                </li>

                <!-- Button -->

                <li>

                    <a href="{{route('login')}}"
                        class="bg-orange-500 text-white px-5 py-3 rounded-full hover:bg-orange-600 transition flex items-center gap-2">

                        <i class="fa-solid fa-right-to-bracket"></i>

                        Connexion

                    </a>

                </li>
                <!-- <li>
                    <a href="{{route('visit')}}"
                        class="bg-black text-white rounded-full pl-1 pr-6 py-1 flex items-center gap-3 hover:bg-orange-500 transition duration-300">

                        <span class="bg-orange-500 w-10 h-10 rounded-full flex items-center justify-center text-white">

                            <i class="fa-solid fa-calendar-days"></i>

                        </span>

                        Planifiez une visite
                    </a>
                </li> -->

            </ul>

            <!-- Mobile Button -->
            <button id="menu-btn"
                class="lg:hidden text-2xl text-gray-700">

                <i class="fa-solid fa-bars"></i>

            </button>

        </div>

    </div>

    <!-- MOBILE MENU -->
    <div id="mobile-menu"
        class="hidden lg:hidden bg-white border-t">

        <ul class="flex flex-col p-6 space-y-5 font-medium">

            <li>
                <a href="/"
                    class="text-orange-500">
                    Accueil
                </a>
            </li>

            <li>
                <a href="{{route('logement')}}"
                    class="hover:text-orange-500">
                    Logements
                </a>
            </li>

            <li>
                <a href="{{route('apropos')}}"
                    class="hover:text-orange-500">
                    À propos
                </a>
            </li>

            <li>
                <a href="{{route('contact')}}"
                    class="hover:text-orange-500">
                    Contact Us
                </a>
            </li>

            <li>

                <a href="{{route('login')}}"
                    class="bg-orange-500 text-white px-5 py-3 rounded-xl inline-flex items-center gap-2">

                    <i class="fa-solid fa-right-to-bracket"></i>

                    Connexion

                </a>

            </li>

<!--
            <li>
                <a href="{{route('visit')}}"
                    class="bg-black text-white px-5 py-3 rounded-full inline-flex items-center gap-3">

                    <span class="bg-orange-500 w-10 h-10 rounded-full flex items-center justify-center text-white">

                        <i class="fa-solid fa-calendar-days"></i>

                    </span>


                    Planifiez une visite
                </a>
            </li> -->

        </ul>
    </div>

</nav>
