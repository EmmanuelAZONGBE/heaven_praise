<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    //
    protected $fillable = [
        'libelle','indicatif'
    ];
    public function user()
    {
        return $this->hasMany('App\Models\user');
    }
    public function paroisse()
    {
        return $this->hasMany('App\Models\Paroisse');
    }
    public function forumpays()
    {
        return $this->hasMany('App\Models\Forumpays');
    }
    public function evenement()
    {
        return $this->hasMany('App\Models\Evenement');
    }
    public function actualite()
    {
        return $this->hasMany('App\Models\Actualite');
    }
}
