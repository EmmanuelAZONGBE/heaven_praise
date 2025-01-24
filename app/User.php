<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'heavenid','sessionid','nom','email','telephone','role','nomartiste','valide','restreint','avatar','password','description','pays_id','communaute_id','paroisse_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function pays()
    {
        return $this->belongsTo('App\Models\Pays');
    }

    public function communaute()
    {
        return $this->belongsTo('App\Models\Communaute');
    }

    public function paroisse()
    {
        return $this->belongsTo('App\Models\Paroisse');
    }

    public function playlist()
    {
        return $this->hasMany('App\Models\Playlist');
    }
}
