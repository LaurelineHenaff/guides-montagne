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
        Schema::create('concerner', function (Blueprint $table) {
            $table->primary(['code_Sommets', 'code_Randonnees', 'date_Concerner']);
            $table->foreignId('code_Sommets')
                ->constrained('sommets', 'code_Sommets')
                ->onDelete('cascade');
            $table->foreignId('code_Randonnees')
                ->constrained('randonnees', 'code_Randonnees')
                ->onDelete('cascade');
            $table->date('date_Concerner');

            $table->index(['code_Sommets', 'code_Randonnees', 'date_Concerner']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concerner');
    }
};
