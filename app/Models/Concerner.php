<?php

namespace App\Models;

use App\Models\Sommet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Concerner extends Model
{
    use HasFactory;

    protected $primaryKey = ['code_Sommets', 'code_Randonnees'];
    public $incrementing = false;

    // public function sommet()
    // {
    //     $this->belongsTo(Sommet::class, 'code_Sommets');
    // }

    // public function randonnee()
    // {
    //     $this->belongsTo(Sommet::class, 'code_Sommets');
    // }
}
