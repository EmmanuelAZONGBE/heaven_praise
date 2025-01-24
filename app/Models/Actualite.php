<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    protected $fillable = [
        'id','titre','slug','details','banniere','publie','user_id','flash','categorie_id','pays_id','flash'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function categorie()
    {
        return $this->belongsTo('App\Models\Categorie');
    }
    public function pays()
    {
        return $this->belongsTo('App\Models\Pays');
    }
}
