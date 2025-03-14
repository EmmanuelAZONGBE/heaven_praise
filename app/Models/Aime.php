<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Aime extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'single_id'];

    public $timestamps = true; // Active created_at et updated_at

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relation avec la chanson (single)
    public function single()
    {
        return $this->belongsTo(Single::class, 'single_id');
    }
}

