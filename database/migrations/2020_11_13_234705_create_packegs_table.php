<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packegs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',55);
            $table->decimal('amount', 8, 2)->unsigned()->nullable();
            $table->decimal('payment', 6, 2)->unsigned()->nullable();
            $table->unsignedTinyInteger('exp')->nullable();
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
        Schema::dropIfExists('packegs');
    }
}
