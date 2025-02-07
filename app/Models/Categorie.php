<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'slug'
    ];
    public function actualite()
    {
        return $this->hasMany('App\Models\Actualite');
    }
    public function evenement()
    {
        return $this->hasMany('App\Models\Evenement');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

}
