@extends('layouts.dashboard')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">

    <h1 class="text-3xl font-bold text-gray-800 mb-2">Mon Profil</h1>
    <p class="text-sm text-gray-500 mb-8">Gérez vos informations personnelles et les paramètres de sécurité de votre compte.</p>

    {{-- Messages de succès ou d'erreur --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center gap-2">
            <i class="fa-solid fa-circle-check"></i>
            <p class="text-sm font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center text-center h-fit">
            <div class="w-24 h-24 rounded-full bg-orange-500 text-white flex items-center justify-center text-3xl font-bold shadow-md mb-4">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
            <h2 class="text-xl font-bold text-gray-800">{{ auth()->user()->name }}</h2>
            <p class="text-sm text-gray-400 mb-4">{{ auth()->user()->email }}</p>

            <span class="px-3 py-1 bg-orange-50 text-orange-600 rounded-full text-xs font-semibold uppercase tracking-wider border border-orange-100">
                {{ auth()->user()->roles }}
            </span>
        </div>

        <div class="md:col-span-2 space-y-6">

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-user text-orange-500"></i> Informations personnelles
                </h3>

                <form action="{{ route('profile.update')}}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Nom complet</label>
                            <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Numéro de téléphone</label>
                            <input type="text" name="telephone" value="{{ auth()->user()->telephone ?? 'Non renseigné' }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500 outline-none transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Adresse Email</label>
                        <input type="email" value="{{ auth()->user()->email }}" disabled class="w-full px-4 py-2.5 rounded-xl bg-gray-50 border border-gray-200 text-sm text-gray-400 cursor-not-allowed outline-none">
                        <p class="text-xs text-gray-400 mt-1 italic">L'adresse email ne peut pas être modifiée.</p>
                    </div>

                    <div class="flex justify-end pt-2">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition shadow-sm">
                            Sauvegarder les modifications
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-lock text-orange-500"></i> Sécurité du compte
                </h3>

                <form action="{{route('profile.update')}}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Mot de passe actuel</label>
                        <input type="password" name="current_password" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:border-orange-500 outline-none transition">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Nouveau mot de passe</label>
                            <input type="password" name="new_password" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:border-orange-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Confirmer le mot de passe</label>
                            <input type="password" name="new_password_confirmation" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:border-orange-500 outline-none transition">
                        </div>
                    </div>

                    <div class="flex justify-end pt-2">
                        <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition shadow-sm">
                            Mettre à jour le mot de passe
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
