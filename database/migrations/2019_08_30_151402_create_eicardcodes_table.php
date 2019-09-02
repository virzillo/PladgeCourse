<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEicardCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eicardcodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codice')->unique()->nullable();
            $table->enum('attivo', ['0', '1'])->nullable();
            $table->string('operatore')->nullable();

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
        Schema::dropIfExists('eicard_codes');
    }
}
