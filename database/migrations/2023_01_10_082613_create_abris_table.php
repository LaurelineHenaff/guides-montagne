<?php

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
            $table->string('nom_Abris')->nullable();
            $table->string('type_Abris')->nullable();
            // $table->enum('type_Abris', ['cabane', 'refuge']);
            $table->integer('altitude_Abris')->nullable();
            $table->integer('places_Abris')->nullable();
            $table->float('prixNuit_Abris')->nullable();
            $table->float('prixRepas_Abris')->nullable();
            $table->string('telGardien_Abris')->nullable();
            $table->foreignId('code_Vallees')
                ->constrained('vallees', 'code_Vallees')
                ->onDelete('cascade');
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
