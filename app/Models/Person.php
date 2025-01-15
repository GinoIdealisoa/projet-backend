<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'config', 'user_id'];

    protected $casts = [
        'config' => 'array',  
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gpsLogs()
    {
        return $this->hasMany(Mouvement::class);
    }
}