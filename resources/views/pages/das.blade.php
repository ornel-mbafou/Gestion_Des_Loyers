{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts.dashboard')
@section('title', 'admin')

@section('content')

<div class="p-8 bg-slate-50 min-h-screen ml-72 mt-20">

    <!-- PAGE TITLE -->
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-slate-900">
            Dashboard
        </h1>

        <p class="text-slate-500 mt-1">
            Bienvenue sur le tableau de bord GEST-IMMO
        </p>

    </div>

    <!-- STATS CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

        <!-- CARD 1 : Logements (Orange GEST-IMMO) -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-100">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-slate-500 text-sm font-medium">
                        Total Logements
                    </p>

                    <h2 class="text-3xl font-bold text-slate-900 mt-2">
                        120
                    </h2>

                </div>

                <div class="w-14 h-14 rounded-xl bg-orange-50 flex items-center justify-center text-orange-500 text-2xl">

                    <i class="fa-solid fa-building"></i>

                </div>

            </div>

        </div>

        <!-- CARD 2 : Locataires (Bleu Nuit) -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-100">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-slate-500 text-sm font-medium">
                        Locataires
                    </p>

                    <h2 class="text-3xl font-bold text-slate-900 mt-2">
                        85
                    </h2>

                </div>

                <div class="w-14 h-14 rounded-xl bg-slate-100 flex items-center justify-center text-slate-900 text-2xl">

                    <i class="fa-solid fa-users"></i>

                </div>

            </div>

        </div>

        <!-- CARD 3 : Revenus (Vert sémantique) -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-100">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-slate-500 text-sm font-medium">
                        Revenus
                    </p>

                    <h2 class="text-3xl font-bold text-emerald-600 mt-2">
                        3.5M FCFA
                    </h2>

                </div>

                <div class="w-14 h-14 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 text-2xl">

                    <i class="fa-solid fa-money-bill-wave"></i>

                </div>

            </div>

        </div>

        <!-- CARD 4 : Impayés (Rouge alerte) -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-100">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-slate-500 text-sm font-medium">
                        Loyers Impayés
                    </p>

                    <h2 class="text-3xl font-bold text-rose-600 mt-2">
                        12
                    </h2>

                </div>

                <div class="w-14 h-14 rounded-xl bg-rose-50 flex items-center justify-center text-rose-600 text-2xl">

                    <i class="fa-solid fa-triangle-exclamation"></i>

                </div>

            </div>

        </div>

    </div>

    <!-- TABLE + ACTIVITIES -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <!-- TABLE -->
        <div class="xl:col-span-2 bg-white rounded-2xl shadow-sm p-6 border border-slate-100">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6">

                <h2 class="text-xl font-bold text-slate-900">
                    Paiements récents
                </h2>

                <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl text-sm font-medium shadow-sm shadow-orange-200 transition">

                    Voir tout

                </button>

            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="border-b border-slate-100 text-left">

                            <th class="pb-4 text-slate-400 font-medium text-sm">
                                Locataire
                            </th>

                            <th class="pb-4 text-slate-400 font-medium text-sm">
                                Logement
                            </th>

                            <th class="pb-4 text-slate-400 font-medium text-sm">
                                Montant
                            </th>

                            <th class="pb-4 text-slate-400 font-medium text-sm">
                                Statut
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-50">

                        <!-- ROW -->
                        <tr class="hover:bg-slate-50/50 transition">

                            <td class="py-4 text-sm font-medium text-slate-700">
                                Jean Dupont
                            </td>

                            <td class="py-4 text-sm text-slate-500">
                                Appartement A12
                            </td>

                            <td class="py-4 text-sm font-semibold text-slate-900">
                                150 000 FCFA
                            </td>

                            <td class="py-4 text-sm">

                                <span class="bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-medium inline-block">

                                    Payé

                                </span>

                            </td>

                        </tr>

                        <!-- ROW -->
                        <tr class="hover:bg-slate-50/50 transition">

                            <td class="py-4 text-sm font-medium text-slate-700">
                                Marie Claire
                            </td>

                            <td class="py-4 text-sm text-slate-500">
                                Studio B04
                            </td>

                            <td class="py-4 text-sm font-semibold text-slate-900">
                                90 000 FCFA
                            </td>

                            <td class="py-4 text-sm">

                                <span class="bg-rose-50 text-rose-700 px-3 py-1 rounded-full text-xs font-medium inline-block">

                                    Impayé

                                </span>

                            </td>

                        </tr>

                        <!-- ROW -->
                        <tr class="hover:bg-slate-50/50 transition">

                            <td class="py-4 text-sm font-medium text-slate-700">
                                Paul Ndzi
                            </td>

                            <td class="py-4 text-sm text-slate-500">
                                Villa C21
                            </td>

                            <td class="py-4 text-sm font-semibold text-slate-900">
                                250 000 FCFA
                            </td>

                            <td class="py-4 text-sm">

                                <span class="bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-medium inline-block">

                                    Payé

                                </span>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        <!-- ACTIVITIES -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-100">

            <h2 class="text-xl font-bold text-slate-900 mb-6">
                Activités récentes
            </h2>

            <div class="space-y-5">

                <!-- ITEM -->
                <div class="flex gap-4">

                    <div class="w-10 h-10 rounded-full bg-orange-50 flex items-center justify-center text-orange-500 shrink-0">

                        <i class="fa-solid fa-house"></i>

                    </div>

                    <div>

                        <p class="text-sm font-medium text-slate-800">
                            Nouveau logement ajouté
                        </p>

                        <span class="text-xs text-slate-400 block mt-0.5">
                            Il y a 2 heures
                        </span>

                    </div>

                </div>

                <!-- ITEM -->
                <div class="flex gap-4">

                    <div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 shrink-0">

                        <i class="fa-solid fa-money-bill-wave"></i>

                    </div>

                    <div>

                        <p class="text-sm font-medium text-slate-800">
                            Paiement reçu
                        </p>

                        <span class="text-xs text-slate-400 block mt-0.5">
                            Il y a 4 heures
                        </span>

                    </div>

                </div>

                <!-- ITEM -->
                <div class="flex gap-4">

                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-900 shrink-0">

                        <i class="fa-solid fa-user"></i>

                    </div>

                    <div>

                        <p class="text-sm font-medium text-slate-800">
                            Nouveau locataire enregistré
                        </p>

                        <span class="text-xs text-slate-400 block mt-0.5">
                            Aujourd’hui
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
