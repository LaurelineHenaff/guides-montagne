<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Randonnee extends Model
{
    use HasFactory;

    protected $primaryKey = 'code_Randonnees';

    public $timestamps = false;

    public function guide()
    {
        return $this->belongsTo(Guide::class, 'code_Guides');
    }
}
