@extends('layouts.app')

@section('title', 'Logements')

@section('content')

<section class="bg-cover bg-center py-24" style="background-image: url('{{ asset('images/Logement/bglogment.jpg') }}');">

    <div class="max-w-7xl mx-auto px-4 lg:px-8 text-center">

        <div class="inline-block bg-white px-4 py-2 text-sm font-medium uppercase mb-6">
            Accueil / Logements
        </div>

        <h1 class="text-4xl lg:text-6xl font-extrabold text-white uppercase">
            Nos Logements
        </h1>

    </div>

</section>

<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-4 lg:px-8">

        <div class="flex flex-wrap justify-center gap-4 mb-16" id="filter-buttons">

            <button data-filter="all" class="filter-btn bg-orange-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-black transition">
                Tous
            </button>

            <button data-filter="Appartement" class="filter-btn bg-black text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-500 transition">
                Appartement
            </button>

            <button data-filter="Villa" class="filter-btn bg-black text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-500 transition">
                Villa
            </button>

            <button data-filter="Studio" class="filter-btn bg-black text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-500 transition">
                Studio
            </button>

            <button data-filter="Chambre" class="filter-btn bg-black text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-500 transition">
                Chambre
            </button>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

            @forelse ($logements as $logement)
            {{-- 🛠️ FIX ICI : Ajout de class="logement-item" et data-type="{{ $logement->type }}" --}}
            <div data-type="{{ $logement->type }}" class="logement-item bg-gray-50 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300">

                <div class="overflow-hidden">
                    @if($logement->image1)
                    {{-- Cas 1 : Image du formulaire -> on ajoute 'storage/' --}}
                    @if(str_starts_with($logement->image1, 'logement_images/'))
                    <img src="{{ asset('storage/' . $logement->image1) }}"
                        alt="{{ $logement->titre }}"
                        class="w-full h-64 object-cover hover:scale-110 transition duration-500">

                    {{-- Cas 2 : Image locale du Seeder -> chemin direct --}}
                    @else
                    <img src="{{ asset($logement->image1) }}"
                        alt="{{ $logement->titre }}"
                        class="w-full h-64 object-cover hover:scale-110 transition duration-500">
                    @endif
                    @else
                    {{-- Cas de secours si aucune image n'est définie --}}
                    <img src="{{ asset('images/maison1.jpg') }}"
                        alt="{{ $logement->titre }}"
                        class="w-full h-64 object-cover hover:scale-110 transition duration-500">
                    @endif
                </div>

                <div class="p-6">

                    <div class="flex items-center justify-between mb-5">
                        <span class="bg-orange-100 text-orange-500 text-sm font-semibold px-4 py-1 rounded-md uppercase">
                            {{ $logement->type }}
                        </span>
                        <h3 class="text-2xl font-bold text-orange-500">
                            {{ number_format($logement->prix, 0, ',', ' ') }} FCFA
                        </h3>
                    </div>

                    <h2 class="text-xl font-bold text-gray-900 mb-4 leading-8">
                        {{ $logement->titre }}
                    </h2>

                    <div class="grid grid-cols-2 gap-y-3 text-sm text-gray-600 mb-6">
                        <p>Pièces: <span class="font-semibold text-gray-900">{{ $logement->nombre_pieces }}</span></p>
                        <p>Surface: <span class="font-semibold text-gray-900">{{ $logement->superficie ?? 'N/A' }} m²</span></p>
                        <p>Statut: <span class="font-semibold text-orange-500 capitalize">{{ $logement->statut }}</span></p>
                        {{-- 🛠️ FIX ICI : Correction de "addresse" en "addresse" --}}
                        <p>Addresse: <span class="font-semibold text-gray-900">{{ Str::limit($logement->addresse, 15) }}</span></p>
                    </div>

                    <a href="{{ route('logement.detail', $logement->id) }}"
                        class="bg-black text-white py-3 rounded-full flex items-center justify-center hover:bg-orange-500 transition duration-300 font-semibold">
                        Voir détails
                    </a>

                </div>
            </div>
            @empty
            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
                <p class="text-gray-500 text-lg font-medium">Aucun logement disponible pour le moment.</p>
            </div>
            @endforelse

        </div>

    </div>

</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.filter-btn');
        const items = document.querySelectorAll('.logement-item');

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const filterValue = this.getAttribute('data-filter');

                // 1. Gestion visuelle des boutons actifs
                buttons.forEach(btn => {
                    btn.classList.remove('bg-orange-500');
                    btn.classList.add('bg-black');
                });
                this.classList.remove('bg-black');
                this.classList.add('bg-orange-500');

                // 2. Filtrage logique des cartes de logement
                items.forEach(item => {
                    const itemType = item.getAttribute('data-type');

                    if (filterValue === 'all' || itemType === filterValue) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endpush
