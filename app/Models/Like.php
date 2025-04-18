<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'single_id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function single()
    {
        return $this->belongsTo(Single::class);
    }
}
