<?php

namespace Database\Seeders;

use App\Models\Logement;
use App\Models\User;
use Illuminate\Database\Seeder;

class LogementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // On récupère le premier gestionnaire disponible généré par ton UserSeeder
        $gestionnaire = User::where('roles', 'gestionnaire')->first();
        $gestionnaireId = $gestionnaire ? $gestionnaire->id : 1;

        // 📸 Liens d'images en ligne (Unsplash Architecture Haute Qualité)
        // 📸 Liens directs de secours avec extension .jpg (Infaillibles)
        $imgAppartement = '/images/appart1.jpg' ;
        $imgVilla       = '/images/Villa/villa1.jpg';
        $imgStudio      = '/images/Studio/studio1.jpg';
        $imgChambre     = '/images/Studio/studio1.jpg';

        $logements = [
            [
                'titre' => 'Appartement Moderne à Akwa',
                'type' => 'Appartement',
                'prix' => 250000,
                'nombre_pieces' => 3,
                'superficie' => 120,
                'addresse' => 'Akwa, Douala',
                'statut' => 'disponible',
                'image1' => $imgAppartement,
                'image2' => null,
                'image3' => null,
                'gestionnaire_id' => $gestionnaireId,
            ],
            [
                'titre' => 'Villa Luxueuse avec Piscine',
                'type' => 'Villa',
                'prix' => 600000,
                'nombre_pieces' => 5,
                'superficie' => 350,
                'addresse' => 'Bastos, Yaoundé',
                'statut' => 'disponible',
                'image1' => $imgVilla,
                'image2' => null,
                'image3' => null,
                'gestionnaire_id' => $gestionnaireId,
            ],
            [
                'titre' => 'Studio Meublé Chic',
                'type' => 'Studio',
                'prix' => 120000,
                'nombre_pieces' => 1,
                'superficie' => 45,
                'addresse' => 'Tamghé, Bafoussam',
                'statut' => 'disponible',
                'image1' => $imgStudio,
                'image2' => null,
                'image3' => null,
                'gestionnaire_id' => $gestionnaireId,
            ],
            [
                'titre' => 'Grand Duplex Familial',
                'type' => 'Villa',
                'prix' => 450000,
                'nombre_pieces' => 6,
                'superficie' => 280,
                'addresse' => 'Bonamoussadi, Douala',
                'statut' => 'disponible',
                'image1' => $imgVilla,
                'image2' => null,
                'image3' => null,
                'gestionnaire_id' => $gestionnaireId,
            ],
            [
                'titre' => 'Appartement Spacieux',
                'type' => 'Appartement',
                'prix' => 180000,
                'nombre_pieces' => 4,
                'superficie' => 150,
                'addresse' => 'Biyem-Assi, Yaoundé',
                'statut' => 'disponible',
                'image1' => $imgAppartement,
                'image2' => null,
                'image3' => null,
                'gestionnaire_id' => $gestionnaireId,
            ],
            [
                'titre' => "Chambre d'hôte haut standing",
                'type' => 'Chambre',
                'prix' => 85000,
                'nombre_pieces' => 1,
                'superficie' => 35,
                'addresse' => 'Dschang, Ouest',
                'statut' => 'disponible',
                'image1' => $imgChambre,
                'image2' => null,
                'image3' => null,
                'gestionnaire_id' => $gestionnaireId,
            ],
            [
                'titre' => 'Résidence Privée Sécurisée',
                'type' => 'Villa',
                'prix' => 750000,
                'nombre_pieces' => 7,
                'superficie' => 400,
                'addresse' => 'Kribi, Zone Côtière',
                'statut' => 'disponible',
                'image1' => $imgVilla,
                'image2' => null,
                'image3' => null,
                'gestionnaire_id' => $gestionnaireId,
            ],
            [
                'titre' => 'Mini-villa Neuve',
                'type' => 'Villa',
                'prix' => 300000,
                'nombre_pieces' => 3,
                'superficie' => 180,
                'addresse' => 'Odza, Yaoundé',
                'statut' => 'disponible',
                'image1' => $imgVilla,
                'image2' => null,
                'image3' => null,
                'gestionnaire_id' => $gestionnaireId,
            ],
            [
                'titre' => 'Appartement Standing',
                'type' => 'Appartement',
                'prix' => 350000,
                'nombre_pieces' => 3,
                'superficie' => 130,
                'addresse' => 'Bonapriso, Douala',
                'statut' => 'disponible',
                'image1' => $imgAppartement,
                'image2' => null,
                'image3' => null,
                'gestionnaire_id' => $gestionnaireId,
            ],
            [
                'titre' => 'Studio Moderne pour Étudiant',
                'type' => 'Studio',
                'prix' => 60000,
                'nombre_pieces' => 1,
                'superficie' => 30,
                'addresse' => 'Ngaoundéré, Dang',
                'statut' => 'disponible',
                'image1' => $imgStudio,
                'image2' => null,
                'image3' => null,
                'gestionnaire_id' => $gestionnaireId,
            ],
        ];

        foreach ($logements as $logement) {
            Logement::create($logement);
        }
    }
}
