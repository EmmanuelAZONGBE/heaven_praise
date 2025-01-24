<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forumpays extends Model
{
    protected $fillable = [
        'lien','actif','pays_id'
    ];
    public function pays()
    {
        return $this->belongsTo('App\Models\Pays');
    }
}
