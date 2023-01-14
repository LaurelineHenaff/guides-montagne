<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    protected $primaryKey = 'code_Guides';

    protected $fillable = [
        'nom_Guides',
        'prenom_Guides',
        'email_Guides',
        'motdepasse_Guides',
    ];

    public $timestamps = false;
}
