<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    //
    protected $fillable = [
        'id','titre','slug','description','lieu','date','banniere','statut','billeterie','gratuit','user_id','flash','categorie_id','pays_id','flash','vues'
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
    public function evenementcommentaire()
    {
        return $this->hasMany('App\Models\Evenementcommentaire');
    }
    public function ticketevenement()
    {
        return $this->hasMany('App\Models\Ticketevenement');
    }
}
