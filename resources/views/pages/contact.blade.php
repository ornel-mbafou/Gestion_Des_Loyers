@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<!-- HERO -->
<section class="bg-gray-900 py-24">

    <div class="max-w-7xl mx-auto px-4 lg:px-8 text-center">

        <div class="inline-block bg-white px-4 py-2 text-sm font-medium uppercase mb-6">
            Accueil / Contact
        </div>

        <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6">
            Contactez-nous
        </h1>

        <p class="text-gray-300 max-w-2xl mx-auto leading-8">
            Besoin d’informations supplémentaires sur notre plateforme ?
            N’hésitez pas à nous contacter.
        </p>

    </div>

</section>

<!-- CONTACT SECTION -->
<section class="py-20 bg-white">

    <div class="max-w-6xl mx-auto px-4 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14">

            <!-- LEFT -->
            <div>

                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Restons en contact
                </h2>

                <p class="text-gray-600 leading-8 mb-10">
                    GEST-IMMO est une plateforme développée dans le cadre d’un projet académique
                    afin de faciliter la gestion des logements et des loyers.
                </p>

                <!-- CONTACT INFOS -->
                <div class="space-y-6">

                    <!-- EMAIL -->
                    <div class="flex items-center gap-4">

                        <div
                            class="w-14 h-14 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center text-xl">

                            <i class="fa-solid fa-envelope"></i>

                        </div>

                        <div>

                            <h3 class="font-semibold text-gray-900">
                                Email
                            </h3>

                            <p class="text-gray-600">
                                contact@gest-immo.com
                            </p>

                        </div>

                    </div>

                    <!-- PHONE -->
                    <div class="flex items-center gap-4">

                        <div
                            class="w-14 h-14 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center text-xl">

                            <i class="fa-solid fa-phone"></i>

                        </div>

                        <div>

                            <h3 class="font-semibold text-gray-900">
                                Téléphone
                            </h3>

                            <p class="text-gray-600">
                                +237 6 99 99 99 99
                            </p>

                        </div>

                    </div>

                    <!-- LOCATION -->
                    <div class="flex items-center gap-4">

                        <div
                            class="w-14 h-14 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center text-xl">

                            <i class="fa-solid fa-location-dot"></i>

                        </div>

                        <div>

                            <h3 class="font-semibold text-gray-900">
                                Adresse
                            </h3>

                            <p class="text-gray-600">
                                Douala, Cameroun
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT / FORM -->
            <div class="bg-gray-100 rounded-2xl p-8 shadow-sm">

                <form action="#" method="POST" class="space-y-6">

                    <!-- NAME -->
                    <div>

                        <label class="block mb-2 text-gray-700 font-medium">
                            Nom complet
                        </label>

                        <input type="text"
                            placeholder="Votre nom"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">

                    </div>

                    <!-- EMAIL -->
                    <div>

                        <label class="block mb-2 text-gray-700 font-medium">
                            Adresse email
                        </label>

                        <input type="email"
                            placeholder="Votre email"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">

                    </div>

                    <!-- MESSAGE -->
                    <div>

                        <label class="block mb-2 text-gray-700 font-medium">
                            Message
                        </label>

                        <textarea rows="5"
                            placeholder="Votre message..."
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>

                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                        class="bg-black text-white px-8 py-4 rounded-full hover:bg-orange-500 transition duration-300">

                        Envoyer le message

                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection
