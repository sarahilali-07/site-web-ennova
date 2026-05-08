<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $fillable = [
    'nom',
    'prenom',
    'email',
    'motivation',
    'status',
    'school',
    'phone',
    'level',
    'specialty',
   ];

    public function getFirstNameAttribute(): ?string
    {
        return $this->prenom;
    }

    public function getLastNameAttribute(): ?string
    {
        return $this->nom;
    }
}
