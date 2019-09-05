<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');

            // $table->unsignedBigInteger('token_id');
            // $table->foreign('token_id')->references('id')->on('tokens');

            $table->enum('tipo', ['insede', 'online'])->nullable();
            $table->string('nome');
            $table->string('descrizione')->nullable();
            $table->float('iscrizione')->nullable();
            $table->integer('esami')->nullable();
            $table->float('costo')->nullable();

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
        Schema::dropIfExists('courses');
    }
}
