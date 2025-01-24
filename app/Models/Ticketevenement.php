<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticketevenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle','prix','nombre','disponible','evenement_id'
    ];

    public function evenement()
    {
        return $this->belongsTo('App\Models\Evenement');
    }
    public function commande()
    {
        return $this->hasMany('App\Models\Commande');
    }
}
