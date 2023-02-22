<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public static function randonnees(Guide $guide)
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
             WHERE guides.code_Guides = ?;",
            [$guide->code_Guides]
        );

        return $randonnees;
    }
}
