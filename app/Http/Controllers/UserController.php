<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function list()
    {

        $users = User::latest()->get();
        return view('users.list', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(RegisterRequest $request)
    {

        $data = $request->validated();

        //generation du code aleatoire
        $code = rand(100000, 999999);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telephone' => $data['telephone'],
            'roles' => $data['roles'],
            'verification_code' => $code,

        ]);

        return redirect()->route('users.list')
            ->with('succes', 'Utilisateur ajouté avec succès');
    }



    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }



    public function update(RegisterRequest $request, User $user)
    {

        $data = $request->validated();



        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telephone' => $data['telephone'],
            'roles' => $data['roles'],


        ]);

        return redirect()->route('users.list')
            ->with('succes', 'Utilisateur modifier avec sucess avec succès');
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.list')
            ->with('succes', 'Utilisateur supprimé avec succès');
    }
}
