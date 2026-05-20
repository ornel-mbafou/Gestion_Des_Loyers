{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts.dashboard')
@section('title', 'admin')

@section('content')

<div class="p-8 bg-gray-100 min-h-screen ml-72 mt-20">

    <!-- PAGE TITLE -->
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard
        </h1>

        <p class="text-gray-500 mt-1">
            Bienvenue sur le tableau de bord GEST-IMMO
        </p>

    </div>

    <!-- STATS CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

        <!-- CARD 1 -->
        <div class="bg-white rounded-2xl shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 text-sm">
                        Total Logements
                    </p>

                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        120
                    </h2>

                </div>

                <div
                    class="w-14 h-14 rounded-xl bg-orange-100 flex items-center justify-center text-orange-500 text-2xl">

                    <i class="fa-solid fa-building"></i>

                </div>

            </div>

        </div>

        <!-- CARD 2 -->
        <div class="bg-white rounded-2xl shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 text-sm">
                        Locataires
                    </p>

                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        85
                    </h2>

                </div>

                <div
                    class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center text-blue-500 text-2xl">

                    <i class="fa-solid fa-users"></i>

                </div>

            </div>

        </div>

        <!-- CARD 3 -->
        <div class="bg-white rounded-2xl shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 text-sm">
                        Revenus
                    </p>

                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        3.5M FCFA
                    </h2>

                </div>

                <div
                    class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center text-green-500 text-2xl">

                    <i class="fa-solid fa-money-bill-wave"></i>

                </div>

            </div>

        </div>

        <!-- CARD 4 -->
        <div class="bg-white rounded-2xl shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 text-sm">
                        Loyers Impayés
                    </p>

                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        12
                    </h2>

                </div>

                <div
                    class="w-14 h-14 rounded-xl bg-red-100 flex items-center justify-center text-red-500 text-2xl">

                    <i class="fa-solid fa-triangle-exclamation"></i>

                </div>

            </div>

        </div>

    </div>

    <!-- TABLE + ACTIVITIES -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <!-- TABLE -->
        <div class="xl:col-span-2 bg-white rounded-2xl shadow-sm p-6">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6">

                <h2 class="text-xl font-bold text-gray-800">
                    Paiements récents
                </h2>

                <button
                    class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl text-sm transition">

                    Voir tout

                </button>

            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="border-b text-left">

                            <th class="pb-4 text-gray-500 font-medium">
                                Locataire
                            </th>

                            <th class="pb-4 text-gray-500 font-medium">
                                Logement
                            </th>

                            <th class="pb-4 text-gray-500 font-medium">
                                Montant
                            </th>

                            <th class="pb-4 text-gray-500 font-medium">
                                Statut
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y">

                        <!-- ROW -->
                        <tr>

                            <td class="py-4">
                                Jean Dupont
                            </td>

                            <td class="py-4">
                                Appartement A12
                            </td>

                            <td class="py-4">
                                150 000 FCFA
                            </td>

                            <td class="py-4">

                                <span
                                    class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">

                                    Payé

                                </span>

                            </td>

                        </tr>

                        <!-- ROW -->
                        <tr>

                            <td class="py-4">
                                Marie Claire
                            </td>

                            <td class="py-4">
                                Studio B04
                            </td>

                            <td class="py-4">
                                90 000 FCFA
                            </td>

                            <td class="py-4">

                                <span
                                    class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">

                                    Impayé

                                </span>

                            </td>

                        </tr>

                        <!-- ROW -->
                        <tr>

                            <td class="py-4">
                                Paul Ndzi
                            </td>

                            <td class="py-4">
                                Villa C21
                            </td>

                            <td class="py-4">
                                250 000 FCFA
                            </td>

                            <td class="py-4">

                                <span
                                    class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">

                                    Payé

                                </span>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        <!-- ACTIVITIES -->
        <div class="bg-white rounded-2xl shadow-sm p-6">

            <h2 class="text-xl font-bold text-gray-800 mb-6">
                Activités récentes
            </h2>

            <div class="space-y-5">

                <!-- ITEM -->
                <div class="flex gap-4">

                    <div
                        class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-500">

                        <i class="fa-solid fa-house"></i>

                    </div>

                    <div>

                        <p class="text-sm text-gray-800">
                            Nouveau logement ajouté
                        </p>

                        <span class="text-xs text-gray-500">
                            Il y a 2 heures
                        </span>

                    </div>

                </div>

                <!-- ITEM -->
                <div class="flex gap-4">

                    <div
                        class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-500">

                        <i class="fa-solid fa-money-bill-wave"></i>

                    </div>

                    <div>

                        <p class="text-sm text-gray-800">
                            Paiement reçu
                        </p>

                        <span class="text-xs text-gray-500">
                            Il y a 4 heures
                        </span>

                    </div>

                </div>

                <!-- ITEM -->
                <div class="flex gap-4">

                    <div
                        class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">

                        <i class="fa-solid fa-user"></i>

                    </div>

                    <div>

                        <p class="text-sm text-gray-800">
                            Nouveau locataire enregistré
                        </p>

                        <span class="text-xs text-gray-500">
                            Aujourd’hui
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
