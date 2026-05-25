@extends('layouts.app')

@section('title', $logement->titre)

@section('content')

<section class="bg-cover bg-center py-24 relative"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ $logement->image1 ? asset('storage/' . $logement->image1) : asset('images/maison3.jpg') }}');">

    <div class="max-w-7xl mx-auto px-4 lg:px-8 text-center relative z-10">

        <div class="inline-block bg-white px-4 py-2 text-sm font-medium uppercase mb-6 text-gray-800 rounded">
            Accueil / Détail
        </div>

        <h1 class="text-4xl lg:text-6xl font-extrabold text-white uppercase tracking-wide">
            {{ $logement->titre }}
        </h1>

    </div>

</section>

<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-4 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <div class="lg:col-span-2">

                <div class="overflow-hidden rounded-2xl mb-6 shadow-lg border bg-gray-100">
                    @if($logement->image1)
                        <img src="{{ asset('storage/' . $logement->image1) }}"
                            alt="{{ $logement->titre }}"
                            class="w-full h-[500px] object-cover">
                    @else
                        <div class="w-full h-[500px] flex items-center justify-center text-gray-400 font-medium">
                            Aucune image principale disponible
                        </div>
                    @endif
                </div>

                @if($logement->image2 || $logement->image3)
                    <div class="grid grid-cols-3 gap-4 mb-8">
                        @if($logement->image1)
                            <div class="overflow-hidden rounded-xl shadow-sm border h-28 cursor-pointer hover:opacity-80 transition">
                                <img src="{{ asset('storage/' . $logement->image1) }}" alt="Miniature 1" class="w-full h-full object-cover">
                            </div>
                        @endif
                        @if($logement->image2)
                            <div class="overflow-hidden rounded-xl shadow-sm border h-28 cursor-pointer hover:opacity-80 transition">
                                <img src="{{ asset('storage/' . $logement->image2) }}" alt="Miniature 2" class="w-full h-full object-cover">
                            </div>
                        @endif
                        @if($logement->image3)
                            <div class="overflow-hidden rounded-xl shadow-sm border h-28 cursor-pointer hover:opacity-80 transition">
                                <img src="{{ asset('storage/' . $logement->image3) }}" alt="Miniature 3" class="w-full h-full object-cover">
                            </div>
                        @endif
                    </div>
                @endif

                <span class="bg-orange-100 text-orange-500 px-4 py-2 rounded-md text-sm font-semibold inline-block mb-5">
                    {{ $logement->type }}
                </span>

                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    {{ $logement->titre }}
                </h2>

                <div class="flex items-center gap-3 text-gray-500 mb-8">
                    <i class="fa-solid fa-location-dot text-orange-500"></i>
                    <span>{{ $logement->adresse }}</span>
                </div>

                <div class="space-y-6 text-gray-600 leading-8 bg-gray-50 p-6 rounded-2xl border">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Description du bien</h3>
                    <p class="whitespace-pre-line">
                        {{ $logement->description ? $logement->description : "Aucune description fournie pour ce logement." }}
                    </p>
                </div>

            </div>

            <div>

                <div class="bg-white rounded-2xl shadow-lg p-8 border sticky top-6">

                    <div class="mb-8">
                        <h3 class="text-4xl font-bold text-orange-500">
                            {{ number_format($logement->prix, 0, ',', ' ') }} FCFA
                        </h3>
                        <p class="text-gray-500 mt-2">
                            Prix mensuel
                        </p>
                    </div>

                    <div class="space-y-6">

                        <div class="flex items-center justify-between border-b pb-4">
                            <span class="text-gray-500">Type</span>
                            <span class="font-bold text-gray-900">{{ $logement->type }}</span>
                        </div>

                        <div class="flex items-center justify-between border-b pb-4">
                            <span class="text-gray-500">Nombre de pièces</span>
                            <span class="font-bold text-gray-900">{{ $logement->nombre_pieces }}</span>
                        </div>

                        <div class="flex items-center justify-between border-b pb-4">
                            <span class="text-gray-500">Superficie</span>
                            <span class="font-bold text-gray-900">{{ $logement->superficie }} m²</span>
                        </div>

                        <div class="flex items-center justify-between border-b pb-4">
                            <span class="text-gray-500">Statut actuel</span>
                            <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full bg-green-100 text-green-800 capitalize">
                                {{ $logement->statut }}
                            </span>
                        </div>

                    </div>

                    {{-- Assurez-vous d'adapter le paramètre si votre route 'visit' requiert l'ID du logement --}}
                    <a href="{{ route('visit', ['logement' => $logement->id]) }}"
                        class="mt-10 bg-black text-white py-4 rounded-full flex items-center justify-center gap-3 hover:bg-orange-500 transition duration-300">
                        <span class="bg-orange-500 w-10 h-10 rounded-full flex items-center justify-center text-white">
                            <i class="fa-solid fa-calendar-days"></i>
                        </span>
                        Réserver une visite
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection