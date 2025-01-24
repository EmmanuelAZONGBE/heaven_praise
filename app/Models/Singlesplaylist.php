<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Singlesplaylist extends Model
{
    protected $fillable = [
        'playlist_id','single_id'
    ];
    
    public function single()
    {
        return $this->belongsTo('App\Models\single');
    }
    public function playlist()
    {
        return $this->belongsTo('App\Models\playlist');
    }
}
