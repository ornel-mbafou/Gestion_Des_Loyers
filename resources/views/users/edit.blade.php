@extends('layouts.dashboard')

@section('title', 'edit')

@section('content')

<div class="p-8 ml-48">

    <!-- TITLE -->
    <div class="mb-6">

        <h1 class="text-3xl font-bold text-gray-800">
            Modifier utilisateur
        </h1>

        <p class="text-gray-500 mt-2">
            Modifier les informations de l’utilisateur
        </p>

    </div>

    <!-- FORM -->
    <div class="bg-white rounded-xl shadow p-6 max-w-2xl">



        <form action="{{ route('users.update', $user->id) }}"
            method="POST">

            @csrf

            <!-- NAME -->
            <div class="mb-5">

                <label class="block mb-2 font-medium text-gray-700">
                    Nom
                </label>

                <input type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">

            </div>

            <!-- EMAIL -->
            <div class="mb-5">

                <label class="block mb-2 font-medium text-gray-700">
                    Email
                </label>

                <input type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">

            </div>



            <!-- EMAIL -->
            <div class="mb-5">

                <label class="block mb-2 font-medium text-gray-700">
                    Telephone
                </label>

                <input type="tel"
                    name="telephone"
                    value="{{ old('telephone', $user->telephone) }}"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">

            </div>

              <!-- PASSWORD -->
            <div class="mb-5">

                <label class="block mb-2 font-medium text-gray-700">
                    Mot de passe
                </label>

                <input type="password"
                    name="password"
                    placeholder="********"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">

            </div>



            <!-- CONFIRM PASSWORD -->
            <div class="mb-5">

                <label class="block mb-2 font-medium text-gray-700">
                    Confirmer le mot de passe
                </label>

                <div class="relative">

                    <input type="password"
                        name="password_confirmation"
                        placeholder="********"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">

                </div>

            </div>

            <!-- ROLE -->
            <div class="mb-6">
                <label class="block mb-2 font-medium text-gray-700">Rôle</label>

                <select name="roles" class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                    <option value="">Choisir un rôle</option>

                      <!-- Si le rôle de l'utilisateur est 'admin', on écrit 'selected' -->
                    <option value="admin" @if($user->roles == 'admin') selected @endif>
                        Admin
                    </option>

                    <!-- Si le rôle de l'utilisateur est 'gestionnaire', on écrit 'selected' -->
                    <option value="gestionnaire" @if($user->roles == 'gestionnaire') selected @endif>
                        Gestionnaire
                    </option>

                    <!-- Si le rôle de l'utilisateur est 'locataire', on écrit 'selected' -->
                    <option value="locataire" @if($user->roles == 'locataire') selected @endif>
                        Locataire
                    </option>

                    <!-- Si le rôle de l'utilisateur est 'user', on écrit 'selected' -->
                    <option value="user" @if($user->roles == 'user') selected @endif>
                        User
                    </option>
                </select>
            </div>

            <!-- BUTTON -->
            <button type="submit"
                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg transition">

                Modifier utilisateur

            </button>

        </form>

    </div>

</div>

@endsection
