<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Communaute extends Model
{
    //
    protected $fillable = [
        'libelle'
    ];
    public function user()
    {
        return $this->hasMany('App\Models\user');
    }
    public function paroisse()
    {
        return $this->hasMany('App\Models\Paroisse');
    }
    public function forumcommunaute()
    {
        return $this->hasMany('App\Models\Forumcommunaute');
    }
}
