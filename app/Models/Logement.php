<?php

namespace App\Models;

use App\Models\Visite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Logement extends Model
{
    //
    protected $fillable = [
        'titre',
        'description',
        'addresse',
        'type',
        'superficie',
        'nombre_pieces',
        'prix',
        'statut',
        'disponible_le',
        'gestionnaire_id',
        'image1',
        'image2',
        'image3',

    ];

    public function gestionnaire():BelongsTo{
        return $this->belongsTo(User::class, 'gestionnaire_id');
    }


     // Relation : Un logement peut faire l'objet de plusieurs contrats au fil du temps

     public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }


     // Relation : Un logement peut recevoir plusieurs demandes de visites

    public function visites()
    {
        return $this->hasMany(Visite::class);
    }
}
