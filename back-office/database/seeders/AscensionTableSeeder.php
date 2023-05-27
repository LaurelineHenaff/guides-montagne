<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AscensionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ascension')->insert([

            [
                'code_Sommets' => 1,
                'code_Abris' => 1,
                'difficulte_Ascension' => 'débutant',
                'duree_Ascension' => 15
            ],
            [
                'code_Sommets' => 1,
                'code_Abris' => 2,
                'difficulte_Ascension' => 'débutant',
                'duree_Ascension' => 6
            ],
            [
                'code_Sommets' => 1,
                'code_Abris' => 6,
                'difficulte_Ascension' => 'débutant',
                'duree_Ascension' => 10
            ],
            [
                'code_Sommets' => 1,
                'code_Abris' => 7,
                'difficulte_Ascension' => 'confirmé',
                'duree_Ascension' => 4
            ],
            [
                'code_Sommets' => 1,
                'code_Abris' => 8,
                'difficulte_Ascension' => 'confirmé',
                'duree_Ascension' => 10
            ],
            [
                'code_Sommets' => 2,
                'code_Abris' => 3,
                'difficulte_Ascension' => 'confirmé',
                'duree_Ascension' => 14
            ],
            [
                'code_Sommets' => 2,
                'code_Abris' => 7,
                'difficulte_Ascension' => 'débutant',
                'duree_Ascension' => 12
            ],
            [
                'code_Sommets' => 2,
                'code_Abris' => 8,
                'difficulte_Ascension' => 'confirmé',
                'duree_Ascension' => 15
            ],
            [
                'code_Sommets' => 3,
                'code_Abris' => 3,
                'difficulte_Ascension' => 'confirmé',
                'duree_Ascension' => 6
            ],
            [
                'code_Sommets' => 3,
                'code_Abris' => 4,
                'difficulte_Ascension' => 'confirmé',
                'duree_Ascension' => 5
            ],
            [
                'code_Sommets' => 3,
                'code_Abris' => 5,
                'difficulte_Ascension' => 'expert',
                'duree_Ascension' => 18
            ],
            [
                'code_Sommets' => 3,
                'code_Abris' => 7,
                'difficulte_Ascension' => 'expert',
                'duree_Ascension' => 18
            ],
            [
                'code_Sommets' => 3,
                'code_Abris' => 8,
                'difficulte_Ascension' => 'expert',
                'duree_Ascension' => 12
            ],
            [
                'code_Sommets' => 3,
                'code_Abris' => 9,
                'difficulte_Ascension' => 'confirmé',
                'duree_Ascension' => 7
            ],
            [
                'code_Sommets' => 3,
                'code_Abris' => 10,
                'difficulte_Ascension' => 'expert',
                'duree_Ascension' => 24
            ],
            [
                'code_Sommets' => 4,
                'code_Abris' => 4,
                'difficulte_Ascension' => 'expert',
                'duree_Ascension' => 15
            ],
            [
                'code_Sommets' => 4,
                'code_Abris' => 5,
                'difficulte_Ascension' => 'débutant',
                'duree_Ascension' => 4
            ],
            [
                'code_Sommets' => 4,
                'code_Abris' => 9,
                'difficulte_Ascension' => 'débutant',
                'duree_Ascension' => 10
            ],
            [
                'code_Sommets' => 4,
                'code_Abris' => 10,
                'difficulte_Ascension' => 'confirmé',
                'duree_Ascension' => 8
            ],
            [
                'code_Sommets' => 5,
                'code_Abris' => 4,
                'difficulte_Ascension' => 'expert',
                'duree_Ascension' => 20
            ],
            [
                'code_Sommets' => 5,
                'code_Abris' => 5,
                'difficulte_Ascension' => 'débutant',
                'duree_Ascension' => 4
            ],
            [
                'code_Sommets' => 5,
                'code_Abris' => 9,
                'difficulte_Ascension' => 'confirmé',
                'duree_Ascension' => 14
            ],
            [
                'code_Sommets' => 5,
                'code_Abris' => 10,
                'difficulte_Ascension' => 'débutant',
                'duree_Ascension' => 8
            ],
            [
                'code_Sommets' => 6,
                'code_Abris' => 4,
                'difficulte_Ascension' => 'expert',
                'duree_Ascension' => 22
            ],
            [
                'code_Sommets' => 6,
                'code_Abris' => 5,
                'difficulte_Ascension' => 'débutant',
                'duree_Ascension' => 8
            ],
            [
                'code_Sommets' => 6,
                'code_Abris' => 9,
                'difficulte_Ascension' => 'confirmé',
                'duree_Ascension' => 18
            ],
            [
                'code_Sommets' => 6,
                'code_Abris' => 10,
                'difficulte_Ascension' => 'débutant',
                'duree_Ascension' => 6
            ],

        ]);
    }
}
