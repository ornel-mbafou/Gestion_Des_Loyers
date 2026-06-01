@extends('layouts.dashboard')

@section('title', 'create-user')

@section('content')

<div class="p-8 ml-40">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Ajouter un utilisateur
        </h1>
        <p class="text-gray-500 mt-2">
            Remplissez les informations ci-dessous
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 max-w-2xl">

        <form action="@if(auth()->user()->roles === 'admin') {{ route('admin.users.store') }} @else {{ route('gestionnaire.users.store') }} @endif"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Image
                </label>
                <input type="file"
                    name="image"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Nom
                </label>
                <input type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Email
                </label>
                <input type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Telephone
                </label>
                <input type="tel"
                    name="telephone"
                    value="{{ old('telephone') }}"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-medium text-gray-700">
                    Rôle
                </label>

                <select name="roles"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" required>

                    @if(auth()->user()->roles !== 'admin')
                        <option value="locataire" selected>Locataire</option>
                    @else
                        <option value="">Choisir un rôle</option>
                        <option value="admin">Admin</option>
                        <option value="gestionnaire">Gestionnaire</option>
                        <option value="locataire">Locataire</option>
                        <option value="user">User</option>
                    @endif

                </select>
            </div>

            <button type="submit"
                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg transition">
                Ajouter utilisateur
            </button>

        </form>

    </div>

</div>

@endsection
