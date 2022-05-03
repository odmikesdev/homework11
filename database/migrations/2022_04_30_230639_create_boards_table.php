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
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description');
            $table->timestamps();


        });
        Schema::create('users_has_boards', function (Blueprint $table) {
           $table->id();
           $table->foreignId('users_id');
           $table->foreignId('boards_id');

           $table->foreign('users_id')->references('id')->on('users');
           $table->foreign('boards_id')->references('id')->on('boards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_has_boards', function (Blueprint $table) {
            $table->dropForeign('users_id');
            $table->dropForeign('boards_id');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('boards_id');
            $table->dropForeign('cards_id');
        });
        Schema::dropIfExists('orders');
        Schema::dropIfExists('users_has_boards');
        Schema::dropIfExists('boards');
    }
};
