<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre','lien','banniere','encours','publie','user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
