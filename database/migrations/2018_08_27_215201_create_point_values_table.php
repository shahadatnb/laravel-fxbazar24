<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_values', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('user_id')->references('id')->on('users');
            $table->string('remark')->nullable();
            $table->decimal('receipt', 10, 2)->unsigned()->nullable();
            $table->decimal('payment', 10, 2)->unsigned()->nullable();
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
        Schema::dropIfExists('point_values');
    }
}
