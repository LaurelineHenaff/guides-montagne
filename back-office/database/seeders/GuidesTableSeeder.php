<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guides')->insert([
            [
                'code_Guides' => 1,
                'nom_Guides' => "Truc",
                'prenom_Guides' => "Bidule",
                'email_Guides' => "bidule.truc@mail.fr",
                'motdepasse_Guides' => "\$pass",
            ],
            [
                'code_Guides' => 2,
                'nom_Guides' => "Chouette",
                'prenom_Guides' => "Machin",
                'email_Guides' => "machin.chouette@mail.net",
                'motdepasse_Guides' => "\$pass",
            ],
        ]);
    }
}
