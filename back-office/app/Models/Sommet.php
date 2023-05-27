<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sommet extends Model
{
    use HasFactory;

    protected $primaryKey = 'code_Sommets';

    protected $fillable = [
        'nom_Sommets',
        'altitude_Sommets',
    ];

    public $timestamps = false;

    /**
     * Requête : récupérer les randonnées concernées par un sommet donné
     */
    public static function randonnees(Sommet $sommet)
    {
        $randonnees = DB::select(
            "SELECT CONCAT(guides.prenom_Guides, ' ', guides.nom_Guides) AS nom_guide,
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
                 SELECT concerner.code_Randonnees
                 FROM concerner
                 JOIN sommets ON concerner.code_Sommets = sommets.code_Sommets
                 AND sommets.code_Sommets = ?);",
            [$sommet->code_Sommets]
        );

        return $randonnees;
    }

    /**
     * Requête : récupérer les ascensions qui vont vers un sommet donné
     */
    public static function ascensions(Sommet $sommet)
    {
        $ascensions = DB::select(
            "SELECT abris.nom_Abris, sommets.nom_Sommets
             FROM ascension
             JOIN abris ON abris.code_Abris = ascension.code_Abris
             JOIN sommets ON sommets.code_Sommets = ascension.code_Sommets
             WHERE sommets.code_Sommets = ?",
            [$sommet->code_Sommets]
        );

        return $ascensions;
    }

    /**
     * Requête : supprimer un sommet donné avec toutes ses randonnées associées
     * (les ascensions, réservations, et concerner sont supprimés par CASCADE)
     */
    public static function deleteOne(Sommet $sommet)
    {
        DB::delete(
            "DELETE FROM randonnees
             WHERE randonnees.code_Randonnees IN (
                 SELECT concerner.code_Randonnees
                 FROM concerner, sommets
                 WHERE concerner.code_Sommets = sommets.code_Sommets
                 AND sommets.code_Sommets = ?);",
            [$sommet->code_Sommets]
        );

        $sommet->delete();
    }

    // /**
    //  * Relation : les ascensions qui atteignent un sommet.
    //  */
    // public function ascensions()
    // {
    //     return $this->hasMany(Ascension::class, 'code_Sommets');
    // }
}
