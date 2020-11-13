<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBettGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bett_games', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('admin_id')->references('id')->on('users');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('teamA')->nullable();
            $table->string('teamB')->nullable();
            $table->string('winner')->nullable();
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
        Schema::dropIfExists('bett_games');
    }
}
