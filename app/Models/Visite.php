<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    //
    protected $fillable = [
        'user_id',
        'logement_id',
        'nom_visiteur',
        'telephone_visiteur',
        'date_visite',
        'statut',
        'commentaire',
    ];



    /**
     * Relation : Une visite appartient à un Gestionnaire (User)
     */
    public function gestionnaire()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation : Une visite concerne un Logement précis
     */
    public function logement()
    {
        return $this->belongsTo(Logement::class, 'logement_id');
    }

}
