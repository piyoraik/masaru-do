<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->integer('item_id');
            $table->integer('user_id');
            $table->integer('sale_user_id');
            $table->integer('status');
            $table->string('payjp_trade_id');
            $table->string('pay_method');
            $table->integer('amount');
            $table->integer('shipping');
            $table->string('postal_code');
            $table->string('address_name');
            $table->string('address');
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
        Schema::dropIfExists('trades');
    }
}
