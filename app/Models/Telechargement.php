<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telechargement extends Model
{
    use HasFactory;

    protected $table = 'telechargements';

    protected $fillable = [
        'single_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function single()
    {
        return $this->belongsTo(Single::class);
    }
}
