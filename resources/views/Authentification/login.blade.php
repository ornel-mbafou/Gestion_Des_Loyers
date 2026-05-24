{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.auth')
@section('tiltel', 'Login')
@section('content')

<div class="min-h-screen bg-gray-100 flex items-center justify-center px-4 py-4">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl overflow-hidden">

        <!-- TOP -->
        <div class="bg-orange-500 px-8 py-2 text-center">

            <div class="flex items-center justify-center gap-4">

                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-orange-500 text-3xl shadow-lg">


                    <i class="fa-solid fa-house"></i>

                </div>

                <h1 class="text-2xl font-bold text-white">
                    GEST-IMMO
                </h1>
            </div>

            <p class="text-orange-100 mt-2 text-sm">
                Plateforme de gestion des loyers
            </p>

        </div>

        <!-- FORM -->
        <div class="p-8">

            <!-- TITLE -->
            <div class="text-center mb-8">

                <h2 class="text-2xl font-bold text-gray-800">
                    Connexion
                </h2>

                <p class="text-gray-500 mt-2 text-sm">
                    Connectez-vous à votre espace
                </p>

            </div>

            <!-- FORM -->
            <form action="{{route('logins')}}" method="POST" class="space-y-6">

                @csrf

                <!-- EMAIL -->
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Adresse email
                    </label>

                    <div class="relative">

                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">

                            <i class="fa-solid fa-envelope"></i>

                        </span>

                        <input type="email"
                            name="email"
                            placeholder="exemple@gmail.com" value="{{ old('email') }}"
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none">

                    </div>

                </div>

                <!-- PASSWORD -->
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Mot de passe
                    </label>

                    <div class="relative">

                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">

                            <i class="fa-solid fa-lock"></i>

                        </span>

                        <input type="password"
                            name="password"
                            placeholder="********"
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none">

                    </div>

                </div>

                <!-- REMEMBER -->
                <div class="flex items-center justify-between text-sm">

                    <label class="flex items-center gap-2 text-gray-600">

                        <input type="checkbox"
                            class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">

                        Se souvenir de moi

                    </label>

                    <a href="#"
                        class="text-orange-500 hover:underline">

                        Mot de passe oublié ?

                    </a>

                </div>

                <!-- BUTTON -->
                <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl font-medium transition duration-300 shadow-md">

                    <i class="fa-solid fa-right-to-bracket mr-2"></i>

                    Se connecter

                </button>

            </form>

            <!-- REGISTER -->
            <div class="text-center mt-8">

                <p class="text-gray-600 text-sm">

                    Vous n’avez pas encore de compte ?

                    <a href="{{route('register')}}"
                        class="text-orange-500 font-medium hover:underline">

                        S’inscrire

                    </a>

                </p>

            </div>

        </div>

    </div>

</div>

@endsection
