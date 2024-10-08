<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date_naissance',
        'lieu_naissance',
        'lieu_residence',
        'genre',
        'mail',
        'tel',
        'raison_org',
        'competence',
        'experience',
        'confirmation',
    ];
}
