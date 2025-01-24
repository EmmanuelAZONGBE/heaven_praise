<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference','session_id','commentaire','modedepaiement','prix','qte','montant',
        'paye','livre','ticketevenement_id','evenement_id','livraison_id','user_id'
    ];

    public function ticketevenement()
    {
        return $this->belongsTo('App\Models\Ticketevenement');
    }
    public function evenement()
    {
        return $this->belongsTo('App\Models\Evenement');
    }
    public function user_error()
    {
        return $this->belongsTo('App\Models\User');
    }

}
