<?php

namespace App\Models;

use App\Models\Abri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Vallee extends Model
{
    use HasFactory;

    protected $primaryKey = 'code_Vallees';

    protected $fillable = ['nom_Vallees'];

    public $timestamps = false;

    /**
     * Requête : récupérer les ascensions associées à une vallée donnée
     */
    public static function ascensions(Vallee $vallee)
    {
        $ascensions = DB::select(
            "SELECT abris.nom_Abris, sommets.nom_Sommets
             FROM ascension
             JOIN abris ON abris.code_Abris = ascension.code_Abris
             JOIN vallees ON vallees.code_Vallees = abris.code_Vallees
             JOIN sommets ON sommets.code_Sommets = ascension.code_Sommets
             WHERE vallees.code_Vallees = ?",
            [$vallee->code_Vallees]
        );

        return $ascensions;
    }

    /**
     * Requête : récupérer les randonnées associées à une vallée donnée
     */
    public static function randonnees(Vallee $vallee)
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
                    JOIN vallees ON abris.code_Vallees = vallees.code_Vallees
                    WHERE rando2.code_Randonnees = rando1.code_Randonnees) AS nombre_reservations
             FROM randonnees AS rando1
             JOIN guides ON rando1.code_Guides = guides.code_Guides
             WHERE rando1.code_Randonnees IN (
                 SELECT reserver.code_Randonnees
                 FROM reserver
                 JOIN abris ON reserver.code_Abris = abris.code_Abris
                 JOIN vallees ON abris.code_Vallees = vallees.code_Vallees
                 AND vallees.code_Vallees = ?);",
            [$vallee->code_Vallees]
        );

        return $randonnees;
    }

    /**
     * Requête : supprimer une vallée donnée et toutes ses randonnées associées
     * (les abris, ascensions, réservations, et concerner sont supprimés par CASCADE)
     */
    public static function deleteOne(Vallee $vallee)
    {
        DB::delete(
            "DELETE
             FROM randonnees
             WHERE randonnees.code_Randonnees IN (
                 SELECT reserver.code_Randonnees
                 FROM reserver, abris, vallees
                 WHERE reserver.code_Abris = abris.code_Abris
                 AND abris.code_Vallees = vallees.code_Vallees
                 AND vallees.code_Vallees = ?);",
            [$vallee->code_Vallees]
        );

        $vallee->delete();
    }

    /**
     * Relation : les abris de la vallée.
     */
    public function abris()
    {
        return $this->hasMany(Abri::class, 'code_Vallees');
    }
}
