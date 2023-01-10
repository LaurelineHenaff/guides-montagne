<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AbrisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abris')->insert([

            [
                'code_Abris' => 1,
                'nom_Abris' => 'cabane1',
                'type_Abris' => 'cabane',
                'altitude_Abris' => 1000,
                'places_Abris' => 12,
                'prixNuit_Abris' => 5.0,
                'prixRepas_Abris' =>  NULL,
                'telGardien_Abris' => NULL,
                'code_Vallees' => 1
            ],
            [
                'code_Abris' => 2,
                'nom_Abris' => 'cabane2',
                'type_Abris' => 'cabane',
                'altitude_Abris' => 1100,
                'places_Abris' => 12,
                'prixNuit_Abris' => 5.0,
                'prixRepas_Abris' =>  NULL,
                'telGardien_Abris' => NULL,
                'code_Vallees' => 1
            ],
            [
                'code_Abris' => 3,
                'nom_Abris' => 'cabane3',
                'type_Abris' => 'cabane',
                'altitude_Abris' => 1200,
                'places_Abris' => 12,
                'prixNuit_Abris' => 5.0,
                'prixRepas_Abris' =>  NULL,
                'telGardien_Abris' => NULL,
                'code_Vallees' => 2
            ],
            [
                'code_Abris' => 4,
                'nom_Abris' => 'cabane4',
                'type_Abris' => 'cabane',
                'altitude_Abris' => 1500,
                'places_Abris' => 12,
                'prixNuit_Abris' => 7.50,
                'prixRepas_Abris' =>  NULL,
                'telGardien_Abris' => NULL,
                'code_Vallees' => 3
            ],
            [
                'code_Abris' => 5,
                'nom_Abris' => 'cabane5',
                'type_Abris' => 'cabane',
                'altitude_Abris' => 1800,
                'places_Abris' => 12,
                'prixNuit_Abris' => 8.0,
                'prixRepas_Abris' =>  NULL,
                'telGardien_Abris' => NULL,
                'code_Vallees' => 3
            ],
            [
                'code_Abris' => 6,
                'nom_Abris' => 'refuge1',
                'type_Abris' => 'refuge',
                'altitude_Abris' => 750,
                'places_Abris' => 25,
                'prixNuit_Abris' => 12.0,
                'prixRepas_Abris' =>  7.50,
                'telGardien_Abris' => '0612345678',
                'code_Vallees' => 1
            ],
            [
                'code_Abris' => 7,
                'nom_Abris' => 'refuge2',
                'type_Abris' => 'refuge',
                'altitude_Abris' => 1150,
                'places_Abris' => 15,
                'prixNuit_Abris' => 17.0,
                'prixRepas_Abris' =>  9.50,
                'telGardien_Abris' => '0612345600',
                'code_Vallees' => 2
            ],
            [
                'code_Abris' => 8,
                'nom_Abris' => 'refuge3',
                'type_Abris' => 'refuge',
                'altitude_Abris' => 800,
                'places_Abris' => 20,
                'prixNuit_Abris' => 14.0,
                'prixRepas_Abris' =>  7.50,
                'telGardien_Abris' => '0611010678',
                'code_Vallees' => 2
            ],
            [
                'code_Abris' => 9,
                'nom_Abris' => 'refuge4',
                'type_Abris' => 'refuge',
                'altitude_Abris' => 1200,
                'places_Abris' => 10,
                'prixNuit_Abris' => 18.0,
                'prixRepas_Abris' =>  10.0,
                'telGardien_Abris' => '0643215678',
                'code_Vallees' => 3
            ],
            [
                'code_Abris' => 10,
                'nom_Abris' => 'refuge5',
                'type_Abris' => 'refuge',
                'altitude_Abris' => 400,
                'places_Abris' => 15,
                'prixNuit_Abris' => 15.0,
                'prixRepas_Abris' =>  10.50,
                'telGardien_Abris' => '0600340078',
                'code_Vallees' => 3
            ],

        ]);
    }
}
