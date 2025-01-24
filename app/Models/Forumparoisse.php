<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forumparoisse extends Model
{
    //
    protected $fillable = [
        'lien','actif','paroisse_id'
    ];
    public function paroisse()
    {
        return $this->belongsTo('App\Models\Paroisse');
    }
}
