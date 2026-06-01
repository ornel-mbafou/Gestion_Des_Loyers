@extends('layouts.dashboard')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-12 mt-10">

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-950 uppercase">Mon Contrat de Location</h1>
            <p class="text-sm text-gray-500">Réf : #CNT-{{ $contrat->id }}</p>
        </div>
        <span class="px-4 py-2 rounded-full text-sm font-semibold {{ $contrat->statut === 'actif' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
            ● Contrat {{ ucfirst($contrat->statut) }}
        </span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2 space-y-6">

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-house text-orange-500"></i> Le Logement
                </h2>
                <div class="flex gap-4">
                    <div class="w-24 h-20 bg-gray-100 rounded-xl overflow-hidden shrink-0">
                        <img src="{{ asset('storage/' . $contrat->logement->image1) }}" class="w-full h-full object-cover" alt="">
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 text-base">{{ $contrat->logement->titre }}</h3>
                        <p class="text-sm text-gray-500">{{ $contrat->logement->type }} — {{ $contrat->logement->superficie }} m²</p>
                        <p class="text-xs text-gray-400 mt-1"><i class="fa-solid fa-location-dot"></i> {{ $contrat->logement->addresse }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-calendar-days text-orange-500"></i> Dates du bail
                </h2>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div class="p-4 bg-gray-50 rounded-xl">
                        <p class="text-gray-500 text-xs">Date d'entrée / Prise d'effet</p>
                        <p class="font-semibold text-gray-800 mt-1">{{ date('d/m/Y', strtotime($contrat->date_debut)) }}</p>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-xl">
                        <p class="text-gray-500 text-xs">Date de fin de bail</p>
                        <p class="font-semibold text-gray-800 mt-1">
                            {{ $contrat->date_fin ? date('d/m/Y', strtotime($contrat->date_fin)) : 'Bail reconductible' }}
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="space-y-6">

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 bg-gradient-to-b from-white to-orange-50/30">
                <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-wallet text-orange-500"></i> Détails financiers
                </h2>
                <div class="space-y-3 text-sm pb-4 border-b border-gray-100">
                    <div class="flex justify-between text-gray-600">
                        <span>Loyer Net</span>
                        <span>{{ number_format($contrat->loyer_hors_charges, 0, ',', ' ') }} FCFA</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Charges mensuelles</span>
                        <span>{{ number_format($contrat->charges, 0, ',', ' ') }} FCFA</span>
                    </div>
                </div>
                <div class="flex justify-between items-center pt-4">
                    <span class="text-base font-bold text-gray-900">Total Mensuel</span>
                    <span class="text-xl font-black text-orange-600">{{ number_format($contrat->loyer_total, 0, ',', ' ') }} FCFA</span>
                </div>
                <p class="text-xs text-gray-400 mt-3 italic text-center">
                    <i class="fa-solid fa-circle-info"></i> À régler avant le 5 de chaque mois.
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-file-pdf text-orange-500"></i> Mes Documents
                </h2>
                <div class="space-y-2">
                    <a href="#" class="flex items-center justify-between p-3 bg-gray-50 hover:bg-gray-100 rounded-xl transition text-sm text-gray-700 font-medium group">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-file-signature text-red-500"></i> Contrat de bail.pdf</span>
                        <i class="fa-solid fa-download text-gray-400 group-hover:text-gray-600"></i>
                    </a>
                    <a href="#" class="flex items-center justify-between p-3 bg-gray-50 hover:bg-gray-100 rounded-xl transition text-sm text-gray-700 font-medium group">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-clipboard-check text-blue-500"></i> État des lieux.pdf</span>
                        <i class="fa-solid fa-download text-gray-400 group-hover:text-gray-600"></i>
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
