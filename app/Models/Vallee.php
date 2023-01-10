<?php

namespace App\Models;

use App\Models\Abri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vallee extends Model
{
    use HasFactory;

    protected $primaryKey = 'code_Vallees';

    protected $fillable = ['nom_Vallees'];

    /**
     * Relation : les abris de la vallée.
     */
    public function abris()
    {
        return $this->hasMany(Abri::class, 'code_Vallees');
    }
}
