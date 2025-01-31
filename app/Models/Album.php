<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $fillable = [
        'titre','slug','description','cover','statut','masque','recommanded','user_id'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function single()
    {
        return $this->hasMany('App\Models\Single');
    }
}
