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
        Schema::create('logements', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('addresse');
            $table->text('description')->nullable();
            $table->string('type');
            $table->float('superficie')->nullable();
            $table->integer('nombre_pieces');
            $table->float('prix');
            $table->enum('statut', ['disponible', 'loué', 'en maintenance'])->default('disponible');
            $table->string('image1');
            $table->string('image2')->nullable();  
            $table->string('image3')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logements');
    }
};
