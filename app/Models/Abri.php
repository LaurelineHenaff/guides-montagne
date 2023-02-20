<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    protected $with = ['vallee'];

    public $timestamps = false;

    /**
     * Requête : récupérer les ascensions depuis un abri donné
     */
    public static function ascensions(Abri $abri)
    {
        $ascensions = DB::select(
            "SELECT abris.nom_Abris, sommets.nom_Sommets
             FROM ascension
             JOIN abris ON abris.code_Abris = ascension.code_Abris
             JOIN sommets ON sommets.code_Sommets = ascension.code_Sommets
             WHERE abris.code_Abris = ?",
            [$abri->code_Abris]
        );

        return $ascensions;
    }

    /**
     * Requête : récupérer les randonnées qui utilisent un abri donné
     */
    public static function randonnees(Abri $abri)
    {
        $randonnees = DB::select(
            "SELECT CONCAT(guides.nom_Guides, ' ', guides.prenom_Guides) AS nom_guide,
                    rando1.dateDebut_Randonnees,
                    rando1.dateFin_Randonnees,
                    (SELECT COUNT(reserver.code_Randonnees)
                    FROM randonnees AS rando2
                    JOIN reserver ON rando2.code_Randonnees = reserver.code_Randonnees
                    JOIN guides ON rando2.code_Guides = guides.code_Guides
                    JOIN abris ON reserver.code_Abris = abris.code_Abris
                    WHERE rando2.code_Randonnees = rando1.code_Randonnees) AS nombre_reservations
             FROM randonnees AS rando1
             JOIN guides ON rando1.code_Guides = guides.code_Guides
             WHERE rando1.code_Randonnees IN (
                 SELECT reserver.code_Randonnees
                 FROM reserver
                 JOIN abris ON reserver.code_Abris = abris.code_Abris
                 AND abris.code_Abris = ?);",
            [$abri->code_Abris]
        );

        return $randonnees;
    }

    /**
     * Relation : la vallée ou se trouve l'abri.
     */
    public function vallee()
    {
        return $this->belongsTo(Vallee::class, 'code_Vallees');
    }

    // /**
    //  * Relation : les ascension au départ d'un abris.
    //  */
    // public function ascensions()
    // {
    //     return $this->hasMany(Ascension::class, 'code_Abris');
    // }
}
