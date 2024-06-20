<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

    protected $fillable= [
        'nom',
        'prenom',
        'email',
        'telephone',
        'cv',
        'lettre_motivation',
        'offre_id',
        'etat',
        'title',
        'user_id',
        'description',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
