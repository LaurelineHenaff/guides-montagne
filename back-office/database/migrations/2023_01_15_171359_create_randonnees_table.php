<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('randonnees', function (Blueprint $table) {
            $table->id('code_Randonnees');
            $table->integer('nbPersonnes_Randonnees')->nullable();
            $table->date('dateDebut_Randonnees');
            $table->date('dateFin_Randonnees');
            $table->foreignId('code_Guides')
                ->constrained('guides', 'code_Guides')
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
        Schema::dropIfExists('randonnees');
    }
};
