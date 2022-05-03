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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
        });
        Schema::create('users_has_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->foreignId('cards_id');

            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::table('users_has_boards', function (Blueprint $table) {
            $table->dropForeign('users_id');
            $table->dropForeign('cards_id');
        });
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropForeign('cards_id');
            $table->dropForeign('users_id');
        });
        Schema::dropIfExists('users_has_cards');
        Schema::dropIfExists('cards');
    }
};
