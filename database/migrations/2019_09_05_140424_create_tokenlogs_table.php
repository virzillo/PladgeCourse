<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokenlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokenlogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('token_id');
            $table->foreign('token_id')->references('id')->on('tokens');

            $table->float('costo')->nullable()->default(0);
            $table->float('totale')->nullable()->default(0);
            $table->integer('quantita')->nullable()->default(0);
            $table->enum('tipomovimento', ['in', 'out'])->nullable();
            $table->string('operatore');
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
        Schema::dropIfExists('tokenlogs');
    }
}
