<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sommet extends Model
{
    use HasFactory;

    protected $primaryKey = 'code_Sommets';

    protected $fillable = [
        'nom_Sommets',
        'altitude_Sommets',
    ];

    public $timestamps = false;

    // /**
    //  * Relation : les ascensions qui atteignent un sommet.
    //  */
    // public function ascensions()
    // {
    //     return $this->hasMany(Ascension::class, 'code_Sommets');
    // }
}
