<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model
{
    use HasFactory;
    protected $fillable = ['person_id', 'latitude', 'longitude', 'timestamp'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}