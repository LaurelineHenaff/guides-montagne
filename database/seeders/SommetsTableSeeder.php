<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SommetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sommets')->insert([
            [
                'code_Sommets' => 1,
                'nom_Sommets' => "Sommet1_AB",
                'altitude_Sommets' => 1750,
            ],
            [
                'code_Sommets' => 2,
                'nom_Sommets' => "Sommet2_BB",
                'altitude_Sommets' => 2150,
            ],
            [
                'code_Sommets' => 3,
                'nom_Sommets' => "Sommet3_BC",
                'altitude_Sommets' => 1980,
            ],
            [
                'code_Sommets' => 4,
                'nom_Sommets' => "Sommet4_CC",
                'altitude_Sommets' => 2350,
            ],
            [
                'code_Sommets' => 5,
                'nom_Sommets' => "Sommet5_CC",
                'altitude_Sommets' => 2050,
            ],
            [
                'code_Sommets' => 6,
                'nom_Sommets' => "Sommet6_CD",
                'altitude_Sommets' => 2450,
            ],
        ]);
    }
}
