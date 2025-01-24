<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    //
    protected $fillable = [
        'slug','libelle','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function singleplaylist()
    {
        return $this->hasMany('App\Models\Singleplaylist');
    }
}
