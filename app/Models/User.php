<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'heavenid',
        'sessionid',
        'nom',
        'email',
        'telephone',
        'role',
        'nomartiste',
        'valide',
        'restreint',
        'avatar',
        'nombre_ecoutes',
        'password',
        'description',
        'pays_id',
        'communaute_id',
        'paroisse_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function singles()
    {
        return $this->hasMany(Single::class, 'user_id', 'id');
    }

    public function getTotalEcoutesAttribute()
    {
        return $this->singles()->sum('nombre_ecoutes');
    }

    public function pays()
    {
        return $this->belongsTo('App\Models\Pays');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
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

    public function live()
    {
        return $this->hasMany('App\Models\Live');
    }
    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function telechargements()
    {
        return $this->hasMany(Telechargement::class);
    }

    public function ecoutes()
    {
        return $this->hasMany(Ecoute::class, 'user_id', 'id');
    }

}
