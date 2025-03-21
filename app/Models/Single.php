<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Single extends Model
{

    protected $fillable = [
        'titre',
        'cover',
        'audio',
        'statut',
        'masque',
        'genre_id',
        'user_id',
        'album_id',
    ];
    public function album()
    {
        return $this->belongsTo('App\Models\Album');
    }
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }
    public function ecoutes()
    {
        return $this->hasMany(Ecoute::class);
    }
    public function singleplaylist()
    {
        return $this->belongsTo('App\Models\Singleplaylist');
    }

    public function aimes()
    {
        return $this->hasMany(Aime::class, 'single_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
