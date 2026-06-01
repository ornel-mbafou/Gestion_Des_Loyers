@extends('layouts.app')

@section('title', 'Accueil - GEST-IMMO')

@section('content')

<body class="bg-gray-100">
    <!-- 1. CAROUSEL GENERAL (VILLES DU CAMEROUN & TEXTES REALS) -->
    <section class="relative h-screen w-full overflow-hidden">

        <div id="indicators-carousel" class="relative w-full h-full" data-carousel="slide">
            <div class="relative h-full overflow-hidden">

                <!-- Slide 1: Douala -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1920&q=80"
                        class="absolute block w-full h-full object-cover" alt="Douala Real Estate">

                    <div class="absolute inset-0 bg-black/40 z-10"></div>

                    <div class="absolute inset-0 z-20 flex flex-col justify-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                        <div class="bg-white w-fit px-4 py-2 text-sm font-bold mb-6">
                            <span class="text-gray-900">Bonapriso, </span><span class="text-orange-500">Douala</span>
                        </div>
                        <h1 class="text-5xl md:text-7xl font-extrabold text-white uppercase leading-tight tracking-wide">
                            Profitez!<br>Du meilleur confort<br>au cœur de la capitale économique
                        </h1>
                    </div>
                </div>

                <!-- Slide 2: Yaoundé -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?auto=format&fit=crop&w=1920&q=80"
                        class="absolute block w-full h-full object-cover" alt="Yaounde Real Estate">

                    <div class="absolute inset-0 bg-black/40 z-10"></div>

                    <div class="absolute inset-0 z-20 flex flex-col justify-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                        <div class="bg-white w-fit px-4 py-2 text-sm font-bold mb-6">
                            <span class="text-gray-900">Bastos, </span><span class="text-orange-500">Yaoundé</span>
                        </div>
                        <h1 class="text-5xl md:text-7xl font-extrabold text-white uppercase leading-tight tracking-wide">
                            Soyez rapide!<br>Trouvez un logement<br>calme et sécurisé
                        </h1>
                    </div>
                </div>

                <!-- Slide 3: Kribi -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1920&q=80"
                        class="absolute block w-full h-full object-cover" alt="Kribi Real Estate">

                    <div class="absolute inset-0 bg-black/40 z-10"></div>

                    <div class="absolute inset-0 z-20 flex flex-col justify-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                        <div class="bg-white w-fit px-4 py-2 text-sm font-bold mb-6">
                            <span class="text-gray-900">Cité Balnéaire, </span><span class="text-orange-500">Kribi</span>
                        </div>
                        <h1 class="text-5xl md:text-7xl font-extrabold text-white uppercase leading-tight tracking-wide">
                            Saisissez l'opportunité!<br>Des appartements de haut<br>standing disponibles
                        </h1>
                    </div>
                </div>
            </div>

            <div class="absolute z-30 flex -translate-x-1/2 space-x-3 bottom-10 left-1/2">
                <button type="button" class="w-3 h-3 rounded-full bg-orange-500" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-orange-500" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-orange-500" data-carousel-slide-to="2"></button>
            </div>

            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white/20 group-hover:bg-white/40 backdrop-blur-sm">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="m15 19-7-7 7-7" />
                    </svg>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white/20 group-hover:bg-white/40 backdrop-blur-sm">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="m9 5 7 7-7 7" />
                    </svg>
                </span>
            </button>
        </div>

    </section>

    <!-- 2. SECTION CARACTERISTIQUES GENERALE -->
    <section class="w-full py-24 bg-white flex justify-center overflow-hidden">
        <div class="w-full max-w-[1300px] px-4 md:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-stretch">

                <div class="lg:col-span-4 relative h-full min-h-[500px]">
                    <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        class="w-full h-full object-cover rounded-xl"
                        alt="Immobilier Cameroun">

                    <div class="absolute -bottom-6 -left-6 bg-[#f35525] w-[90px] h-[90px] rounded-full flex items-center justify-center shadow-lg z-10">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                    </div>
                </div>

                <div class="lg:col-span-5 flex flex-col justify-center py-4 lg:pl-6">
                    <span class="text-[#f35525] font-bold text-[15px] tracking-wide mb-4 block">
                        | À LA UNE
                    </span>
                    <h2 class="text-[40px] font-black text-gray-900 leading-[1.2] mb-10">
                        Le Meilleur Choix<br>De Logements Urbains
                    </h2>

                    <div class="bg-[#fafafa] rounded shadow-sm border border-gray-100">
                        <div class="border-b border-gray-200 bg-[#fafafa]">
                            <h4 class="text-[#f35525] font-medium text-[17px] px-6 py-5">
                                Comment ça fonctionne ?
                            </h4>
                            <div class="px-6 pb-6 text-gray-700 text-[15px] leading-relaxed">
                                <strong class="text-black font-bold">GEST-IMMO</strong> simplifie la recherche et la gestion de vos baux au Cameroun. Trouvez votre appartement idéal en quelques clics et gérez vos paiements en toute tranquillité.
                            </div>
                        </div>

                        <div class="border-b border-gray-200 bg-[#fafafa]">
                            <h4 class="text-gray-900 font-medium text-[17px] px-6 py-5 cursor-pointer hover:text-[#f35525] transition-colors">
                                Sécurité des transactions garantie
                            </h4>
                        </div>

                        <div class="bg-[#fafafa] rounded-b">
                            <h4 class="text-gray-900 font-medium text-[17px] px-6 py-5 cursor-pointer hover:text-[#f35525] transition-colors">
                                Visites guidées et service client 24h/7
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <div class="bg-white rounded-xl shadow-[0px_0px_30px_rgba(0,0,0,0.07)] p-8 h-full flex flex-col justify-between">

                        <div class="flex items-center gap-6 py-4 border-b border-gray-100">
                            <svg class="w-[36px] h-[36px] text-[#f35525]" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                            </svg>
                            <div>
                                <h4 class="text-[18px] font-bold text-gray-900 leading-none mb-1.5">Espaces Modulables</h4>
                                <span class="text-gray-400 text-[14px]">Selon vos besoins</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-6 py-4 border-b border-gray-100">
                            <svg class="w-[36px] h-[36px] text-[#f35525]" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <div>
                                <h4 class="text-[18px] font-bold text-gray-900 leading-none mb-1.5">Contrats Légaux</h4>
                                <span class="text-gray-400 text-[14px]">Conformes et transparentes</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-6 py-4 border-b border-gray-100">
                            <svg class="w-[36px] h-[36px] text-[#f35525]" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                            </svg>
                            <div>
                                <h4 class="text-[18px] font-bold text-gray-900 leading-none mb-1.5">Paiement Flexible</h4>
                                <span class="text-gray-400 text-[14px]">Mobile Money admis</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-6 py-4">
                            <svg class="w-[36px] h-[36px] text-[#f35525]" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                            </svg>
                            <div>
                                <h4 class="text-[18px] font-bold text-gray-900 leading-none mb-1.5">Sécurité Totale</h4>
                                <span class="text-gray-400 text-[14px]">Quartier résidentiel</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. SECTION STATISTIQUES REALS -->
    <div class="w-full font-sans overflow-x-hidden">
        <section class="bg-gray-900 py-16 px-4">
            <div class="max-w-[1200px] mx-auto flex flex-wrap justify-center gap-8 lg:gap-12">

                <div class="relative bg-gray-800 rounded-[20px] py-8 px-10 flex items-center gap-6 min-w-[320px] shadow-sm">
                    <span class="text-[40px] font-black text-[#f35525]">100+</span>
                    <p class="text-white font-extrabold text-[16px] leading-tight">
                        Logements<br>Gérés Actuellement
                    </p>
                </div>

                <div class="relative bg-gray-800 rounded-[20px] py-8 px-10 flex items-center gap-6 min-w-[320px] shadow-sm">
                    <span class="text-[40px] font-black text-[#f35525]">5 ans</span>
                    <p class="text-white font-extrabold text-[16px] leading-tight">
                        D'Expérience<br>Sur le Marché
                    </p>
                </div>

                <div class="relative bg-gray-800 rounded-[20px] py-8 px-10 flex items-center gap-6 min-w-[320px] shadow-sm">
                    <span class="text-[40px] font-black text-[#f35525]">98%</span>
                    <p class="text-white font-extrabold text-[16px] leading-tight">
                        De Locataires<br>Satisfaits
                    </p>
                </div>

            </div>
        </section>

        <!-- 4. SECTION FILTRE COMPACTS SANS DENSE BLOC STATIQUE -->
        <section class="w-full py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-10 text-center">
                    <span class="text-orange-500 font-bold text-sm tracking-widest uppercase">| Les Meilleures Offres</span>
                    <h2 class="text-4xl font-extrabold mt-2 text-gray-900 leading-tight">
                        Trouvez Votre Prochain Logement
                    </h2>
                </div>
            </div>
        </section>


        <section class="w-full py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="text-center mb-16">
                    <span class="text-orange-500 font-bold text-sm tracking-widest uppercase">| Nos Propriétés</span>
                    <h2 class="text-4xl font-extrabold mt-2 text-gray-900 leading-tight">
                        Logements récents mis en location
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- On boucle directement sur la variable $logements issue du contrôleur --}}
                    @forelse ($logements as $logement)
                    <div class="bg-gray-50 rounded-xl p-6 flex flex-col hover:shadow-lg transition-shadow duration-300">

                        {{-- Affichage Dynamique de la première image --}}
                        <div class="overflow-hidden">
                            @if($logement->image1)
                            {{-- Cas 1 : L'image a été ajoutée via le formulaire (Contrôleur) --}}
                            @if(str_starts_with($logement->image1, 'logement_images/'))
                            <img src="{{ asset('storage/' . $logement->image1) }}"
                                alt="{{ $logement->titre }}"
                                class="w-full h-56 object-cover rounded-lg mb-5">

                            {{-- Cas 2 : L'image vient du Seeder (Dossier public/images) --}}
                            @else
                            <img src="{{ asset($logement->image1) }}"
                                alt="{{ $logement->titre }}"
                                class="w-full h-56 object-cover rounded-lg mb-5">
                            @endif
                            @else
                            {{-- Cas 3 : Image de secours par défaut si image1 est vide --}}
                            <img src="{{ asset('images/maison1.jpg') }}"
                                alt="{{ $logement->titre }}"
                                class="w-full h-56 object-cover rounded-lg mb-5">
                            @endif
                        </div>

                        <div class="flex justify-between items-center mb-4">
                            <span class="bg-orange-100 text-orange-600 text-sm font-semibold px-3 py-1 rounded">
                                {{ $logement->type }}
                            </span>
                            <span class="text-orange-600 font-extrabold text-xl">
                                {{ number_format($logement->prix, 0, ',', ' ') }} FCFA
                            </span>
                        </div>

                        <h3 class="font-bold text-lg text-gray-900 mb-4 h-14 line-clamp-2">
                            {{ $logement->titre }}
                        </h3>

                        <div class="flex flex-wrap text-sm text-gray-600 gap-x-4 gap-y-2 mb-6">
                            <div>Pièces: <span class="font-bold text-gray-900">{{ $logement->nombre_pieces }}</span></div>
                            <div>Superficie: <span class="font-bold text-gray-900">{{ $logement->superficie ?? 'N/A' }} m²</span></div>
                            <div>Statut: <span class="font-bold text-[#f35525] capitalize">{{ $logement->statut }}</span></div>
                            <div class="w-full text-xs text-gray-400 mt-1">
                                Adresse: <span class="font-medium text-gray-600">{{ Str::limit($logement->adresse, 40) }}</span>
                            </div>
                        </div>

                        <hr class="border-gray-200 mb-6 mt-auto">

                        <div class="text-center">
                            {{-- Redirection vers la route détail --}}
                            <a href="{{ route('logement.detail', $logement->id) }}"
                                class="inline-block bg-gray-900 hover:bg-black text-white rounded-full px-8 py-3 font-semibold text-sm transition w-full">
                                Voir les détails
                            </a>
                        </div>
                    </div>
                    @empty
                    {{-- Message alternatif si aucune donnée n'est en BD --}}
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
                        <p class="text-gray-500 text-lg font-medium">Aucun logement n'est actuellement disponible sur la plateforme.</p>
                    </div>
                    @endforelse
                </div>

            </div>
        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.js"></script>
    @endsection
