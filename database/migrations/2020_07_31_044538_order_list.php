<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_list', function (Blueprint $table) {
        $table->increments('id');
        $table->string('cus_name');
        $table->string('cus_phone');
        $table->string('cus_email');
        $table->text('cus_address');
        $table->tinyInteger('status')->comment('0: Chua xy ly; 1: dang xu ly; 2:da xu ly');
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
        //
    }
}
