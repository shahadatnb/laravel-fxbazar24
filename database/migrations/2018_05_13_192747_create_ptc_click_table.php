<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePtcClickTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptc_click', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('ptc_id');
            $table->unsignedSmallInteger('user_id');
            $table->boolean('confirmed')->nulable();
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
        Schema::dropIfExists('ptc_click');
    }
}
