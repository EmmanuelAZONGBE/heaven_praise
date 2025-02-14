<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Single extends Model
{

    protected $fillable = [
        'titre','cover','audio','statut','masque','genre_id','user_id','album_id'
    ];
    public function album()
    {
        return $this->belongsTo('App\Models\Album');
    }
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function singleplaylist()
    {
        return $this->belongsTo('App\Models\Singleplaylist');
    }

    public function ecoutes()
    {
        return $this->hasOne(Ecoute::class, 'song_id');
    }
}
