<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecoute extends Model
{
    use HasFactory;

    protected $fillable = [
        'single_id',
        'user_id',
        'nombre_ecoutes',
    ];

    // Relation avec le modèle Single
    public function single()
    {
        return $this->belongsTo(Single::class, 'single_id');  // Remplacez 'single_id' par la colonne appropriée
    }



    // Relation avec le modèle User (si l'écoute est associée à un utilisateur)
    public function user()
    {
        return $this->belongsTo('App\Models\Singleplaylist\User');
    }
}
