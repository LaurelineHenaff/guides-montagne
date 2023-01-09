<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ValleesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vallees')->insert([
            [
                'code_Vallees' => 1,
                'nom_Vallees' => "ValleeA",
            ],
            [
                'code_Vallees' => 2,
                'nom_Vallees' => "ValleeB",
            ],
            [
                'code_Vallees' => 3,
                'nom_Vallees' => "ValleeC",
            ],
        ]);
    }
}
