<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConcernerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('concerner')->insert([

            [
                'code_Sommets' => 1,
                'code_Randonnees' => 1,
                'date_Concerner' => '2019-05-10',
            ],
            [
                'code_Sommets' => 2,
                'code_Randonnees' => 1,
                'date_Concerner' => '2019-05-11',
            ],
            [
                'code_Sommets' => 3,
                'code_Randonnees' => 1,
                'date_Concerner' => '2019-05-12',
            ],
            [
                'code_Sommets' => 4,
                'code_Randonnees' => 1,
                'date_Concerner' => '2019-05-13',
            ],
            [
                'code_Sommets' => 5,
                'code_Randonnees' => 1,
                'date_Concerner' => '2019-05-14',
            ],

            // Données supplémentaires
            [
                'code_Sommets' => 4,
                'code_Randonnees' => 2,
                'date_Concerner' => '2019-07-05',
            ],
            [
                'code_Sommets' => 5,
                'code_Randonnees' => 2,
                'date_Concerner' => '2019-07-06',
            ],
            [
                'code_Sommets' => 6,
                'code_Randonnees' => 2,
                'date_Concerner' => '2019-07-07',
            ],

        ]);
    }
}
