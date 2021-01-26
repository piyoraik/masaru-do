<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('genre_id');
            $table->integer('dateship_id');
            $table->integer('itemstatus_id');
            $table->string('itemid');
            $table->string('item_name');
            $table->string('item_path')->default('default.png');
            $table->text('item_detail');
            $table->integer('price');
            $table->string('date_shipping');
            $table->integer('item_detail_flag');
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
        Schema::dropIfExists('items');
    }
}
