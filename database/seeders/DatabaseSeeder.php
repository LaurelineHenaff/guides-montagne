<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(GuidesTableSeeder::class);
        $this->call(SommetsTableSeeder::class);
        $this->call(ValleesTableSeeder::class);
        $this->call(AbrisTableSeeder::class);
        $this->call(AscensionTableSeeder::class);
        $this->call(RandonneesTableSeeder::class);
    }
}
