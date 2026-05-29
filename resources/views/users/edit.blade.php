@extends('layouts.dashboard')

@section('title', 'Modifier l\'utilisateur')

@section('content')

<div class="p-8 ml-40">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Modifier l'utilisateur : {{ $user->name }}
        </h1>
        <p class="text-gray-500 mt-2">
            Modifiez les informations ci-dessous
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 max-w-2xl">

        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Image de profil
                </label>

                @if($user->image)
                    <div class="mb-3">
                        <p class="text-xs text-gray-400 mb-1">Image actuelle :</p>
                        <img src="{{ asset('storage/' . $user->image) }}" alt="Profil" class="w-20 h-20 object-cover rounded-lg border">
                    </div>
                @endif

                <input type="file"
                    name="image"
                    accept="image/*"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">

            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Nom
                </label>
                <input type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}" class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">


            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Email
                </label>
                <input type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}" class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">

            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Telephone
                </label>
                <input type="tel"
                    name="telephone"
                    value="{{ old('telephone', $user->telephone) }}" class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-medium text-gray-700">
                    Rôle
                </label>
                <select name="roles"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">

                    <option value="">Choisir un rôle</option>

                    <option value="admin" {{ old('roles', $user->roles) == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>

                    <option value="gestionnaire" {{ old('roles', $user->roles) == 'gestionnaire' ? 'selected' : '' }}>
                        Gestionnaire
                    </option>

                    <option value="locataire" {{ old('roles', $user->roles) == 'locataire' ? 'selected' : '' }}>
                        Locataire
                    </option>

                    <option value="user" {{ old('roles', $user->roles) == 'user' ? 'selected' : '' }}>
                        User
                    </option>
                </select>

                @error('roles')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg transition font-medium">
                    Enregistrer les modifications
                </button>

                <a href="{{ route('users.list') }}"
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg transition font-medium flex align-center">
                    Annuler
                </a>
            </div>

        </form>
    </div>
</div>

@endsection
