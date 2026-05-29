@extends('layouts.dashboard')


@section('content')

<div class="p-8">

   <h1 class="text-3xl font-bold mb-6 text-gray-800">
    @if(request('role') == 'gestionnaire')
        Liste des Gestionnaires
    @elseif(request('role') == 'locataire')
        Liste des Locataires
    @else
        Liste des utilisateurs
    @endif
</h1>

    <a href="{{route('users.create')}}"
        class="bg-orange-500 text-white px-4 py-2 rounded">

        Ajouter utilisateur

    </a>

    <div class="bg-white mt-6 rounded shadow p-6">

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">
                        Image
                    </th>

                    <th class="text-left py-3">
                        Nom
                    </th>

                    <th class="text-left py-3">
                        Email
                    </th>

                    <th class="text-left py-3">
                        Telephone
                    </th>

                    <th class="text-left py-3">
                        Rôle
                    </th>

                    <th class="text-left py-3">
                        Actions
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($users as $user)

                <tr class="border-b">

                    <td class="py-4">


                        <img src="{{ asset('storage/' . $user->image) }}"
                            alt="Image utilisateur"
                            class="w-16 h-16 object-cover rounded-lg">

                    </td>

                    <td class="py-4">

                        {{ $user->name }}

                    </td>

                    <td class="py-4">

                        {{ $user->email }}

                    </td>

                    <td class="py-4">

                        {{ $user->telephone }}

                    </td>

                    <td class="py-4">

                        {{ $user->roles }}

                    </td>

                    <td class="py-4 flex gap-3">

                        <a href="{{ route('users.edit', $user->id) }}"
                            class="text-blue-500">

                            Modifier

                        </a>

                        <form action="{{ route('users.delete', $user->id) }}" 
                            method="POST"
                            onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">


                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="text-red-500">

                                Supprimer

                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>



@endsection
