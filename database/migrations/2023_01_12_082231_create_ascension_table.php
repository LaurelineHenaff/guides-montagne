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
        Schema::create('ascension', function (Blueprint $table) {
            $table->foreignId('code_Sommets')->constrained('sommets', 'code_Sommets');
            $table->foreignId('code_Abris')->constrained('abris', 'code_Abris');
            $table->string('difficulte_Ascension');
            $table->string('duree_Ascension');
            $table->primary(['code_Sommets', 'code_Abris']);

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
        Schema::dropIfExists('ascension');
    }
};
