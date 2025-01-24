<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forumcommunaute extends Model
{
    //
    protected $fillable = [
        'lien','actif','communaute_id'
    ];
    public function communaute()
    {
        return $this->belongsTo('App\Models\Communaute');
    }
}
