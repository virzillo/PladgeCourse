<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nome');
            $table->string('cognome');
            $table->enum('sesso', ['maschio', 'femmina'])->nullable();
            $table->string('codfiscale')->nullable();
            $table->string('telefono')->nullable();
            $table->string('cellulare')->nullable();
            $table->string('email');
            $table->string('password')->nullable();

            $table->string('citta')->nullable();
            $table->date('data')->nullable();
            $table->string('provincia')->nullable();

            $table->string('indirizzo')->nullable();
            $table->string('cittadom')->nullable();
            $table->string('provinciadom')->nullable();
            $table->string('cap')->nullable();

            $table->string('titolostudio')->nullable();
            $table->string('occupazione')->nullable();

            $table->enum('active', ['0', '1'])->nullable();
            $table->enum('type', ['0', '1'])->nullable();

            // $table->integer('active');
            // $table->integer('type')->nullable();
            $table->string('creator')->nullable();

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
        Schema::dropIfExists('customers');
    }
}
