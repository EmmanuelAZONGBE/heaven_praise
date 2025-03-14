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

    // Relation avec les singles
    public function singles()
    {
        return $this->hasMany(Single::class); // Relation entre Album et Single
    }

    // Relation avec les écoutes (via les singles)
    public function ecoutes()
    {
        return $this->hasManyThrough(Ecoute::class, Single::class, 'album_id', 'single_id');
    }

    // Récupérer les statistiques des écoutes et clics
    public function getTotalEcoutesAttribute()
    {
        return $this->ecoutes()->sum('ecoutes.nombre_ecoutes');
    }

    public function getTotalClicksAttribute()
    {
        return $this->ecoutes()->sum('ecoutes.nombre_clicks');
    }
}
