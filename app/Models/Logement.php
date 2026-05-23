<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logement extends Model
{
    //
    protected $fillable = [
        'titre',
        'description',
        'adresse',
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
}
