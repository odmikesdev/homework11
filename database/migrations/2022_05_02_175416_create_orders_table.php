<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('boards_id');
            $table->foreignId('cards_id');
            $table->bigInteger('order');

            $table->foreign('boards_id')->references('id')->on('boards');
            $table->foreign('cards_id')->references('id')->on('cards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('boards_id');
            $table->dropForeign('cards_id');
        });
        Schema::dropIfExists('orders');
    }
};
