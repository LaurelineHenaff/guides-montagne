<?php

use App\Models\Vallee;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abris', function (Blueprint $table) {
            $table->id('code_Abris');
            $table->string('nom_Abris');
            $table->string('type_Abris');
            // $table->enum('type_Abris', ['cabane', 'refuge']);
            $table->integer('altitude_Abris');
            $table->integer('places_Abris');
            $table->float('prixNuit_Abris');
            $table->float('prixRepas_Abris')->nullable();
            $table->string('telGardien_Abris')->nullable();
            $table->foreignId('code_Vallees')->constrained('vallees', 'code_Vallees');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abris');
    }
};
