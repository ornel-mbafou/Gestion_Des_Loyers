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
        Schema::table('logements', function (Blueprint $table) {
            //
            $table->foreignId('gestionnaire_id')->after('statut')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('logements', function (Blueprint $table) {
            //
            $table->dropForeign(['gestionnaire_id']);
            $table->dropColumn('gestionnaire_id');
        });
    }
};
