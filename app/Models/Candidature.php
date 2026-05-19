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

    public function getStatusTranslationKeyAttribute(): string
    {
        return match ($this->status) {
            'accepted' => 'messages.admin.candidates.approved',
            'rejected' => 'messages.admin.candidates.rejected',
            'review' => 'messages.admin.candidates.review',
            default => 'messages.admin.candidates.pending',
        };
    }
}
