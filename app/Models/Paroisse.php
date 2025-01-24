<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paroisse extends Model
{
    //
    protected $fillable = [
        'libelle','communaute_id','pays_id'
    ];
    public function user()
    {
        return $this->hasMany('App\Models\user');
    }

    public function communaute()
    {
        return $this->belongsTo('App\Models\Communaute');
    }

    public function pays()
    {
        return $this->belongsTo('App\Models\Pays');
    }
    public function forumparoisse()
    {
        return $this->hasMany('App\Models\Forumparoisse');
    }
}
