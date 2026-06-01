@extends('layouts.dashboard')

@section('content')

<div class="p-8">

    {{-- 1. TITRE DYNAMIQUE --}}
    <h1 class="text-3xl font-bold mb-6 text-gray-800">
        @if(request('role') == 'gestionnaire')
            Liste des Gestionnaires
        @elseif(request('role') == 'locataire')
            Liste des Locataires
        @else
            Liste des utilisateurs
        @endif
    </h1>

    {{-- 2. BOUTON AJOUTER : Change de route selon la personne connectée --}}
    @if(auth()->user()->roles === 'admin')
        <a href="{{ route('admin.users.create') }}" class="bg-orange-500 text-white px-4 py-2 rounded">
            Ajouter un utilisateur
        </a>
    @else
        <a href="{{ route('gestionnaire.users.create') }}" class="bg-orange-500 text-white px-4 py-2 rounded">
            Ajouter un locataire
        </a>
    @endif

    <div class="bg-white mt-6 rounded shadow p-6">

        <table class="w-full">
            <thead>
                <tr class="border-b">
                    <th class="text-left py-3">Image</th>
                    <th class="text-left py-3">Nom</th>
                    <th class="text-left py-3">Email</th>
                    <th class="text-left py-3">Telephone</th>
                    <th class="text-left py-3">Rôle</th>
                    <th class="text-left py-3">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr class="border-b">

                    {{-- Image --}}
                    <td class="py-4">
                        <img src="{{ asset('storage/' . $user->image) }}"
                            alt="Image utilisateur"
                            class="w-16 h-16 object-cover rounded-lg">
                    </td>

                    {{-- Nom --}}
                    <td class="py-4">{{ $user->name }}</td>

                    {{-- Email --}}
                    <td class="py-4">{{ $user->email }}</td>

                    {{-- Téléphone --}}
                    <td class="py-4">{{ $user->telephone }}</td>

                    {{-- Rôle --}}
                    <td class="py-4">
                        <span class="px-2 py-1 rounded text-xs font-semibold {{ $user->roles === 'admin' ? 'bg-red-100 text-red-700' : ($user->roles === 'gestionnaire' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700') }}">
                            {{ ucfirst($user->roles) }}
                        </span>
                    </td>

                    {{-- 3. ACTIONS : Les liens s'adaptent selon l'utilisateur connecté --}}
                    <td class="py-4 flex gap-3">

                        {{-- Bouton Modifier --}}
                        @if(auth()->user()->roles === 'admin')
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500 hover:underline">Modifier</a>
                        @else
                            <a href="{{ route('gestionnaire.users.edit', $user->id) }}" class="text-blue-500 hover:underline">Modifier</a>
                        @endif

                        {{-- Formulaire Supprimer --}}
                        @if(auth()->user()->roles === 'admin')
                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                            </form>
                        @else
                            <form action="{{ route('gestionnaire.users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce locataire ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                            </form>
                        @endif

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
