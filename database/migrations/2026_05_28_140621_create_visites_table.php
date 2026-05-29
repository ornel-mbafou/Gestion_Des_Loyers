<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visites', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Clé étrangère vers le gestionnaire qui organise (table users)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Clé étrangère vers le logement à visiter
            $table->foreignId('logement_id')->constrained('logements')->onDelete('cascade');
            $table->string('nom_visiteur');
            $table->string('telephone_visiteur');

            $table->dateTime('date_visite'); // Date et heure du RDV
            $table->enum('statut', ['en_attente', 'effectuee', 'annulee'])->default('en_attente');
            $table->text('commentaire')->nullable(); // Rapport de visite
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visites');
    }
};
