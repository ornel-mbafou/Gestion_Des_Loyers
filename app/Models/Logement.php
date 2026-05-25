<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function gestionnaire():BelongsTo{
        return $this->belongsTo(User::class, 'gestionnaire_id');
    }
}
