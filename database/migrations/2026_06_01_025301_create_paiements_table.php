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
        Schema::create('paiements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Le locataire qui paie
            $table->foreignId('logement_id')->constrained()->onDelete('cascade'); // Le logement concerné
            $table->integer('montant'); // Le montant payé
            $table->string('mois'); // Pour quel mois 
            $table->string('methode'); // Ex: "OM", "Momo", "Virement"
            $table->string('statut')->default('en_attente'); // en_attente ou valide
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
