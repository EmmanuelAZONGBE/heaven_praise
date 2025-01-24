<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    protected $fillable = [
        'libelle','slug'
    ];
    public function single()
    {
        return $this->hasMany('App\Models\Models\Single');
    }

    
}
