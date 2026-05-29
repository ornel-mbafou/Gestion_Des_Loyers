<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Création d'un premier utilisateur (ex: un Admin)
        User::create([
            'name' => 'Denis Admin',
            'email' => 'denis@example.com',
            'password' => Hash::make('password123'),
            'telephone' => '87654321',
            'roles' => 'admin',
        ]);

        // Création d'un deuxième utilisateur (ex: un Locataire)
        User::create([
            'name' => 'Astrid Locataire',
            'email' => 'astrid@example.com',
            'password' => Hash::make('secret123'),
            'telephone' => '12345678',
            'roles' => 'client',
        ]);
    }
}
