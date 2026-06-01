<?php

namespace App\Models;

use App\Models\Logement;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    //
    protected $fillable = ['logement_id', 'user_id', 'date_debut', 'date_fin', 'loyer_mensuel', 'statut'];

    // Liaison vers le Logement
    public function logement()
    {
        return $this->belongsTo(Logement::class);
    }

    // Liaison vers le Locataire
    public function locataire()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
