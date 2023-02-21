<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Ascension extends Model
{
    use HasFactory;

    // protected $table = 'ascension';

    protected $primaryKey = ['code_Sommets', 'code_Abris'];
    public $incrementing = false;

    // protected $with = ['abri', 'sommet'];

    protected $fillable = [
        'code_Sommets',
        'code_Abris',
        'difficulte_Ascension',
        'duree_Ascension',
    ];

    public $timestamps = false;

    public static function randonnees(Abri $abri, Sommet $sommet)
    {
        // Récupérer les randonnées qui ont des ascensions depuis l'abri donné et le sommet donné
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
             JOIN guides ON guides.code_Guides = rando1.code_Guides
             JOIN concerner ON concerner.code_Randonnees = rando1.code_Randonnees
             JOIN reserver ON reserver.code_Randonnees = rando1.code_Randonnees
             WHERE concerner.date_Concerner = reserver.date_Reserver
             AND reserver.code_Abris = ? AND concerner.code_Sommets = ?;",
            [$abri->code_Abris, $sommet->code_Sommets]
        );

        return $randonnees;
    }

    /**
     * Requête : supprimer une ascension avec toutes ses randonnées associées
     * (réservations, et concerner sont supprimés par CASCADE)
     */
    public static function deleteOne(Abri $abri, Sommet $sommet)
    {
        try {
            DB::beginTransaction();

            DB::delete(
                "DELETE FROM randonnees
                 WHERE randonnees.code_Randonnees IN (
                     SELECT randonnees.code_Randonnees
                     FROM randonnees
                     JOIN guides ON guides.code_Guides = randonnees.code_Guides
                     JOIN concerner ON concerner.code_Randonnees = randonnees.code_Randonnees
                     JOIN reserver ON reserver.code_Randonnees = randonnees.code_Randonnees
                     WHERE concerner.date_Concerner = reserver.date_Reserver
                     AND reserver.code_Abris = ? AND concerner.code_Sommets = ?);",
                [$abri->code_Abris, $sommet->code_Sommets]
            );

            DB::delete(
                "DELETE FROM ascension
                 WHERE ascension.code_Abris = ?
                 AND ascension.code_Sommets = ?",
                [$abri->code_Abris, $sommet->code_Sommets]
            );

            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            throw $e;
        }
    }

    // public function abri()
    // {
    //     return $this->belongsTo(Abri::class, 'code_Abris');
    // }

    // public function sommet()
    // {
    //     return $this->belongsTo(Sommet::class, 'code_Sommets');
    // }
}
