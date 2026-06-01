<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultPassword = Hash::make('password');

        // 📸 Banques de liens d'avatars professionnels (Haute Qualité)
        $imgAdmin        ='/images/photo de profil/admin.jpg';
        $imgGestionnaire ='/images/photo de profil/03cebd2282a0dd2ee0524b648b194143.jpg';
        $imgLocataire    = '/images/photo de profil/6cd91d270f12e052b280991b391f5883.jpg';

        $imgFemme1       = 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&h=150&q=80';
        $imgFemme2       = 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=150&h=150&q=80';

        $imgHomme1       = 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=150&h=150&q=80';
        $imgHomme2       = 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=150&h=150&q=80';
        $imgHomme3       = 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=150&h=150&q=80';

        // ==========================================
        // 1. TES COMPTES DE BASE FIXES
        // ==========================================

        // COMPTE ADMIN (Toi)
        User::create([
            'name' => 'Ornel MBAFOU',
            'email' => 'ornelmbafou08@gmail.com',
            'telephone' => '651883691',
            'roles' => 'admin',
            'image' => $imgAdmin,
            'password' => $defaultPassword,
            'email_verified_at' => now(),
            'verification_code' => null,
        ]);

        // COMPTE GESTIONNAIRE PAR DÉFAUT
        $jeanGestionnaire = User::create([
            'name' => 'Jean EBOUM',
            'email' => 'gestionnaire@gmail.com',
            'telephone' => '699111111',
            'roles' => 'gestionnaire',
            'image' => $imgGestionnaire,
            'password' => $defaultPassword,
            'email_verified_at' => now(),
            'verification_code' => null,
        ]);

        // COMPTE LOCATAIRE PAR DÉFAUT
        User::create([
            'name' => 'Marc TCHAMENI',
            'email' => 'visiteur@gmail.com',
            'telephone' => '655222222',
            'roles' => 'locataire',
            'image' => $imgLocataire,
            'gestionnaire_id' => $jeanGestionnaire->id,
            'password' => $defaultPassword,
            'email_verified_at' => now(),
            'verification_code' => null,
        ]);


        // ==========================================
        // 2. LES 3 GESTIONNAIRES UNIQUES
        // ==========================================

        // --- GESTIONNAIRE 1 ---
        $g1 = User::create([
            'name' => 'Alain FOUDA',
            'email' => 'alain.fouda@gmail.com',
            'telephone' => '671234561',
            'roles' => 'gestionnaire',
            'image' => $imgHomme1,
            'password' => $defaultPassword,
            'email_verified_at' => now(),
        ]);

        // Ses 3 Locataires uniques
        User::create(['name' => 'Samuel ETOA', 'email' => 'samuel.etoa@gmail.com', 'telephone' => '691000001', 'roles' => 'locataire', 'image' => $imgHomme2, 'gestionnaire_id' => $g1->id, 'password' => $defaultPassword, 'email_verified_at' => now()]);
        User::create(['name' => 'Chantal BINDZI', 'email' => 'chantal.bindzi@gmail.com', 'telephone' => '691000002', 'roles' => 'locataire', 'image' => $imgFemme1, 'gestionnaire_id' => $g1->id, 'password' => $defaultPassword, 'email_verified_at' => now()]);
        User::create(['name' => 'Christian POUERI', 'email' => 'christian.poueri@gmail.com', 'telephone' => '691000003', 'roles' => 'locataire', 'image' => $imgHomme3, 'gestionnaire_id' => $g1->id, 'password' => $defaultPassword, 'email_verified_at' => now()]);


        // --- GESTIONNAIRE 2 ---
        $g2 = User::create([
            'name' => 'Hervé KAMGA',
            'email' => 'herve.kamga@gmail.com',
            'telephone' => '671234562',
            'roles' => 'gestionnaire',
            'image' => $imgHomme3,
            'password' => $defaultPassword,
            'email_verified_at' => now(),
        ]);

        // Ses 3 Locataires uniques
        User::create(['name' => 'Arthur NGUE', 'email' => 'arthur.ngue@gmail.com', 'telephone' => '692000001', 'roles' => 'locataire', 'image' => $imgHomme1, 'gestionnaire_id' => $g2->id, 'password' => $defaultPassword, 'email_verified_at' => now()]);
        User::create(['name' => 'Mireille KENGNE', 'email' => 'mireille.kengne@gmail.com', 'telephone' => '692000002', 'roles' => 'locataire', 'image' => $imgFemme2, 'gestionnaire_id' => $g2->id, 'password' => $defaultPassword, 'email_verified_at' => now()]);
        User::create(['name' => 'Patrick DIKOUME', 'email' => 'patrick.dikoume@gmail.com', 'telephone' => '692000003', 'roles' => 'locataire', 'image' => $imgHomme2, 'gestionnaire_id' => $g2->id, 'password' => $defaultPassword, 'email_verified_at' => now()]);


        // --- GESTIONNAIRE 3 ---
        $g3 = User::create([
            'name' => 'Alice DJOMO',
            'email' => 'alice.djomo@gmail.com',
            'telephone' => '671234563',
            'roles' => 'gestionnaire',
            'image' => $imgFemme1,
            'password' => $defaultPassword,
            'email_verified_at' => now(),
        ]);

        // Ses 3 Locataires uniques
        User::create(['name' => 'Raoul TIENTCHEU', 'email' => 'raoul.tientcheu@gmail.com', 'telephone' => '693000001', 'roles' => 'locataire', 'image' => $imgHomme1, 'gestionnaire_id' => $g3->id, 'password' => $defaultPassword, 'email_verified_at' => now()]);
        User::create(['name' => 'Béatrice MBANGO', 'email' => 'beatrice.mbango@gmail.com', 'telephone' => '693000002', 'roles' => 'locataire', 'image' => $imgFemme2, 'gestionnaire_id' => $g3->id, 'password' => $defaultPassword, 'email_verified_at' => now()]);
        User::create(['name' => 'Stéphane ONDOA', 'email' => 'stephane.ondoa@gmail.com', 'telephone' => '693000003', 'roles' => 'locataire', 'image' => $imgHomme2, 'gestionnaire_id' => $g3->id, 'password' => $defaultPassword, 'email_verified_at' => now()]);
    }
}
