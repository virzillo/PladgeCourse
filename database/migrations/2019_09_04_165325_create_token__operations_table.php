<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokenOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('token__operations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('token_id');
            $table->foreign('token_id')->references('id')->on('tokens');

            $table->integer('quantita')->nullable();
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
        Schema::dropIfExists('token__operations');
    }
}
