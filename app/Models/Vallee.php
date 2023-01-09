<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vallee extends Model
{
    use HasFactory;

    protected $primaryKey = 'code_Vallees';

    protected $fillable = ['nom_Vallees'];
}
