{{-- resources/views/locataire/dashboard.blade.php --}}

@extends('layouts.dashboard')

@section('content')

<div class="p-6 lg:p-8 bg-gray-100  mt-2 min-h-screen">

    <!-- HEADER -->
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-gray-800">
            Tableau de bord Locataire
        </h1>

        <p class="text-gray-500 mt-2">
            Bienvenue sur votre espace GEST-IMMO
        </p>

    </div>

    <!-- STATS -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

        <!-- CARD -->
        <div class="bg-white rounded-2xl shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 text-sm">
                        Mon Logement
                    </p>

                    <h2 class="text-2xl font-bold text-gray-800 mt-2">
                        Appartement A12
                    </h2>

                </div>

                <div class="w-14 h-14 rounded-xl bg-orange-100 flex items-center justify-center text-orange-500 text-2xl">

                    <i class="fa-solid fa-house"></i>

                </div>

            </div>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-2xl shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 text-sm">
                        Loyer Mensuel
                    </p>

                    <h2 class="text-2xl font-bold text-gray-800 mt-2">
                        150 000 FCFA
                    </h2>

                </div>

                <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center text-green-500 text-2xl">

                    <i class="fa-solid fa-money-bill-wave"></i>

                </div>

            </div>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-2xl shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 text-sm">
                        Paiements Effectués
                    </p>

                    <h2 class="text-2xl font-bold text-gray-800 mt-2">
                        8
                    </h2>

                </div>

                <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center text-blue-500 text-2xl">

                    <i class="fa-solid fa-credit-card"></i>

                </div>

            </div>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-2xl shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 text-sm">
                        Signalements
                    </p>

                    <h2 class="text-2xl font-bold text-gray-800 mt-2">
                        2
                    </h2>

                </div>

                <div class="w-14 h-14 rounded-xl bg-red-100 flex items-center justify-center text-red-500 text-2xl">

                    <i class="fa-solid fa-triangle-exclamation"></i>

                </div>

            </div>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <!-- PAIEMENTS -->
        <div class="xl:col-span-2 bg-white rounded-2xl shadow-sm p-6">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6">

                <h2 class="text-xl font-bold text-gray-800">
                    Historique des paiements
                </h2>

                <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl text-sm transition">

                    Voir tout

                </button>

            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="border-b text-left">

                            <th class="pb-4 text-gray-500 font-medium">
                                Date
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

                        <tr>

                            <td class="py-4">
                                10 Juin 2025
                            </td>

                            <td class="py-4">
                                150 000 FCFA
                            </td>

                            <td class="py-4">

                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">

                                    Payé

                                </span>

                            </td>

                        </tr>

                        <tr>

                            <td class="py-4">
                                10 Mai 2025
                            </td>

                            <td class="py-4">
                                150 000 FCFA
                            </td>

                            <td class="py-4">

                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">

                                    Payé

                                </span>

                            </td>

                        </tr>

                        <tr>

                            <td class="py-4">
                                10 Avril 2025
                            </td>

                            <td class="py-4">
                                150 000 FCFA
                            </td>

                            <td class="py-4">

                                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">

                                    En retard

                                </span>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        <!-- ACTIVITES -->
        <div class="bg-white rounded-2xl shadow-sm p-6">

            <h2 class="text-xl font-bold text-gray-800 mb-6">
                Activités récentes
            </h2>

            <div class="space-y-5">

                <!-- ITEM -->
                <div class="flex gap-4">

                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-500">

                        <i class="fa-solid fa-money-check"></i>

                    </div>

                    <div>

                        <p class="text-sm text-gray-800">
                            Paiement effectué avec succès
                        </p>

                        <span class="text-xs text-gray-500">
                            Il y a 2 jours
                        </span>

                    </div>

                </div>

                <!-- ITEM -->
                <div class="flex gap-4">

                    <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-500">

                        <i class="fa-solid fa-screwdriver-wrench"></i>

                    </div>

                    <div>

                        <p class="text-sm text-gray-800">
                            Signalement envoyé
                        </p>

                        <span class="text-xs text-gray-500">
                            Hier
                        </span>

                    </div>

                </div>

                <!-- ITEM -->
                <div class="flex gap-4">

                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">

                        <i class="fa-solid fa-file-contract"></i>

                    </div>

                    <div>

                        <p class="text-sm text-gray-800">
                            Contrat disponible
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
