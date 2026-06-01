<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiements extends Model
{
    //
    protected $fillable = ['user_id', 'logement_id', 'montant', 'mois', 'methode', 'statut'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function logement()
    {
        return $this->belongsTo(Logement::class);
    }
}
