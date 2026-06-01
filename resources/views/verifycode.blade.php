@extends('layouts.auth')
@section('title', 'verify')
@section('content')

<div class="min-h-screen bg-gray-100 flex items-center justify-center px-4 py-20">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl overflow-hidden">

        <!-- TOP -->
        <div class="bg-orange-500 p-8 text-center">

            <!-- ICON -->
            <div class="w-20 h-20 bg-white rounded-full mx-auto flex items-center justify-center text-orange-500 text-3xl shadow-lg">

                <i class="fa-solid fa-shield-halved"></i>

            </div>

            <h1 class="text-3xl font-bold text-white mt-5">
                Vérification du compte
            </h1>

            <p class="text-orange-100 mt-2 text-sm">
                Activez votre compte GEST-IMMO
            </p>

        </div>

        <!-- CONTENT -->
        <div class="p-8">

            <!-- TITLE -->
            <div class="text-center mb-8">

                <h2 class="text-2xl font-bold text-gray-800">
                    Validation Email
                </h2>

                <p class="text-gray-500 mt-2 text-sm leading-6">
                    Entrez votre code de vérification reçu par email.
                </p>

            </div>


            <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-xl">

                <div class="flex items-center gap-3">

                    <i class="fa-solid fa-circle-exclamation"></i>


                </div>

            </div>


            <!-- FORM -->
            <form action="{{ route('verify') }}"
                method="POST"
                class="space-y-6">

                @csrf

                <!-- EMAIL -->
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Adresse Email
                    </label>

                    <div class="relative">

                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">

                            <i class="fa-solid fa-envelope"></i>

                        </span>

                        <input type="email" name="email" value="{{ request('email', old('email'))}}" required
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none">

                    </div>

                </div>

                <!-- CODE -->
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Code de vérification
                    </label>

                    <div class="relative">

                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">

                            <i class="fa-solid fa-key"></i>

                        </span>

                        <input type="text"
                            name="verification_code"
                            placeholder="Entrez le code reçu"
                            required
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

                <!-- CONFIRM PASSWORD -->
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Confirmer le mot de passe
                    </label>

                    <div class="relative">

                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">

                            <i class="fa-solid fa-lock"></i>

                        </span>

                        <input type="password"
                            name="password_confirmation"
                            placeholder="********"
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none">

                    </div>

                </div>

                <!-- BUTTON -->
                <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl font-medium transition duration-300 shadow-md">

                    <i class="fa-solid fa-check mr-2"></i>

                    Vérifier mon compte

                </button>

            </form>

        </div>

    </div>

</div>

@endsection
