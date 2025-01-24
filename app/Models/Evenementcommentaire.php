<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenementcommentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','nom','email','commentaire','evenement_id'
    ];


    public function evenement()
    {
        return $this->belongsTo('App\Models\Evenement');
    }
}
