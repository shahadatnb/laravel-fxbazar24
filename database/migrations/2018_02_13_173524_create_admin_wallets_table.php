<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_wallets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('user_id')->references('id')->on('users');
            $table->string('remark')->nullable(); 
            $table->double('receipt', 10,2)->nullable();
            $table->double('payment', 10,2)->nullable();
            $table->unsignedTinyInteger('confirm')->default(0);
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
        Schema::dropIfExists('admin_wallets');
    }
}
