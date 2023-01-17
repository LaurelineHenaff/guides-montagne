<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReserverTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('reserver')->insert([

      [
        'code_Abris' => 7,
        'code_Randonnees' => 1,
        'date_Reserver' => '2019-05-10',
        'statut_Reserver' => 'confirmé',
      ],
      [
        'code_Abris' => 3,
        'code_Randonnees' => 1,
        'date_Reserver' => '2019-05-11',
        'statut_Reserver' => 'confirmé',
      ],
      [
        'code_Abris' => 4,
        'code_Randonnees' => 1,
        'date_Reserver' => '2019-05-12',
        'statut_Reserver' => 'confirmé',
      ],
      [
        'code_Abris' => 5,
        'code_Randonnees' => 1,
        'date_Reserver' => '2019-05-13',
        'statut_Reserver' => 'confirmé',
      ],
      [
        'code_Abris' => 10,
        'code_Randonnees' => 1,
        'date_Reserver' => '2019-05-14',
        'statut_Reserver' => 'en attente',
      ],

      // Données supplémentaires
      [
        'code_Abris' => 4,
        'code_Randonnees' => 2,
        'date_Reserver' => '2019-07-05',
        'statut_Reserver' => 'confirmé',
      ],
      [
        'code_Abris' => 5,
        'code_Randonnees' => 2,
        'date_Reserver' => '2019-07-06',
        'statut_Reserver' => 'en attente',
      ],
      [
        'code_Abris' => 10,
        'code_Randonnees' => 2,
        'date_Reserver' => '2019-07-07',
        'statut_Reserver' => 'en attente',
      ],

    ]);
  }
}
