@extends('layouts.app')

@section('title', 'Logements')

@section('content')

<!-- PAGE HEADER -->
<section class="bg-cover bg-center py-24"


    style="background-image: url('{{asset('images/Logement/bglogment.jpg')}}');">



    <div class="max-w-7xl mx-auto px-4 lg:px-8 text-center">

        <div class="inline-block bg-white px-4 py-2 text-sm font-medium uppercase mb-6">
            Accueil / Logements
        </div>

        <h1 class="text-4xl lg:text-6xl font-extrabold text-white uppercase">
            Nos Logements
        </h1>

    </div>

</section>

<!-- PROPERTIES SECTION -->
<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-4 lg:px-8">

        <!-- FILTER BUTTONS -->
        <div class="flex flex-wrap justify-center gap-4 mb-16">

            <button
                class="bg-orange-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-black transition">
                Tous
            </button>

            <button
                class="bg-black text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-500 transition">
                Appartement
            </button>

            <button
                class="bg-black text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-500 transition">
                Villa
            </button>

            <button
                class="bg-black text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-500 transition">
                Studio
            </button>

        </div>

        <!-- PROPERTIES GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

            <!-- CARD -->
            <div class="bg-gray-50 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300">

                <!-- Image -->
                <div class="overflow-hidden">

                    <img
                        src="{{ asset('images/maison1.jpg')}}"
                        alt="Appartement"
                        class="w-full h-64 object-cover hover:scale-110 transition duration-500">

                </div>

                <!-- Content -->
                <div class="p-6">

                    <!-- Type + Price -->
                    <div class="flex items-center justify-between mb-5">

                        <span class="bg-orange-100 text-orange-500 text-sm font-semibold px-4 py-1 rounded-md">
                            Appartement
                        </span>

                        <h3 class="text-2xl font-bold text-orange-500">
                            250 000 FCFA
                        </h3>

                    </div>

                    <!-- Title -->
                    <h2 class="text-xl font-bold text-gray-900 mb-4 leading-8">
                        Appartement Moderne à Douala
                    </h2>

                    <!-- Infos -->
                    <div class="grid grid-cols-2 gap-y-3 text-sm text-gray-600 mb-6">

                        <p>
                            Chambres:
                            <span class="font-semibold text-gray-900">3</span>
                        </p>

                        <p>
                            Salles de bain:
                            <span class="font-semibold text-gray-900">2</span>
                        </p>

                        <p>
                            Surface:
                            <span class="font-semibold text-gray-900">120m²</span>
                        </p>

                        <p>
                            Parking:
                            <span class="font-semibold text-gray-900">Oui</span>
                        </p>

                    </div>

                    <!-- Button -->
                    <a href="{{route('logement.detail')}}"
                        class="bg-black text-white py-3 rounded-full flex items-center justify-center hover:bg-orange-500 transition duration-300">

                        Voir détails

                    </a>

                </div>

            </div>

            <!-- CARD -->
            <div class="bg-gray-50 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300">

                <div class="overflow-hidden">

                    <img
                        src=" {{asset('images/Villa/villa1.jpg')}}"
                        alt="Villa"
                        class="w-full h-64 object-cover hover:scale-110 transition duration-500">

                </div>

                <div class="p-6">

                    <div class="flex items-center justify-between mb-5">

                        <span class="bg-orange-100 text-orange-500 text-sm font-semibold px-4 py-1 rounded-md">
                            Villa
                        </span>

                        <h3 class="text-2xl font-bold text-orange-500">
                            500 000 FCFA
                        </h3>

                    </div>

                    <h2 class="text-xl font-bold text-gray-900 mb-4 leading-8">
                        Villa Luxueuse à Yaoundé
                    </h2>

                    <div class="grid grid-cols-2 gap-y-3 text-sm text-gray-600 mb-6">

                        <p>Chambres: <span class="font-semibold text-gray-900">5</span></p>

                        <p>Salles de bain: <span class="font-semibold text-gray-900">4</span></p>

                        <p>Surface: <span class="font-semibold text-gray-900">300m²</span></p>

                        <p>Parking: <span class="font-semibold text-gray-900">Oui</span></p>

                    </div>

                    <a href="{{route('logement.detail')}}"
                        class="bg-black text-white py-3 rounded-full flex items-center justify-center hover:bg-orange-500 transition duration-300">

                        Voir détails

                    </a>

                </div>

            </div>

            <!-- CARD -->
            <div class="bg-gray-50 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300">

                <div class="overflow-hidden">

                    <img
                        src="{{ asset('images/Studio/studio1.jpg')}}" alt="Studio"
                        class="w-full h-64 object-cover hover:scale-110 transition duration-500">

                </div>

                <div class="p-6">

                    <div class="flex items-center justify-between mb-5">

                        <span class="bg-orange-100 text-orange-500 text-sm font-semibold px-4 py-1 rounded-md">
                            Studio
                        </span>

                        <h3 class="text-2xl font-bold text-orange-500">
                            120 000 FCFA
                        </h3>

                    </div>

                    <h2 class="text-xl font-bold text-gray-900 mb-4 leading-8">
                        Studio Moderne à Bafoussam
                    </h2>

                    <div class="grid grid-cols-2 gap-y-3 text-sm text-gray-600 mb-6">

                        <p>Chambres: <span class="font-semibold text-gray-900">1</span></p>

                        <p>Salles de bain: <span class="font-semibold text-gray-900">1</span></p>

                        <p>Surface: <span class="font-semibold text-gray-900">45m²</span></p>

                        <p>Parking: <span class="font-semibold text-gray-900">Non</span></p>

                    </div>

                    <a href="{{route('logement.detail')}}"
                        class="bg-black text-white py-3 rounded-full flex items-center justify-center hover:bg-orange-500 transition duration-300">

                        Voir détails

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
