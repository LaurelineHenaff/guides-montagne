<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abri extends Model
{
    use HasFactory;

    protected $primaryKey = 'code_Abris';

    protected $fillable = [
        'nom_Abris',
        'type_Abris',
        'altitude_Abris',
        'places_Abris',
        'prixNuit_Abris',
        'prixRepas_Abris',
        'telGardien_Abris',
        'code_Vallees',
    ];
}
