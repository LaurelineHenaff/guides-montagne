<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ascension extends Model
{
    use HasFactory;

    // protected $table = 'ascension';

    protected $primaryKey = ['code_Sommets', 'code_Abris'];
    public $incrementing = false;

    // protected $with = ['abris', 'sommets'];

    protected $fillable = [
        'code_Sommets',
        'code_Abris',
        'difficulte_Ascension',
        'duree_Ascension',
    ];

    public $timestamps = false;

    // public function abris()
    // {
    //     return $this->belongsTo(Abri::class, 'code_Abris');
    // }

    // public function sommets()
    // {
    //     return $this->belongsTo(Sommet::class, 'code_Sommets');
    // }
}
