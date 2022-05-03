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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cards_id');
            $table->foreignId('users_id');
            $table->enum('subscription', ['signed', 'unsigned']);

            $table->foreign('cards_id')->references('id')->on('cards');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropForeign('cards_id');
            $table->dropForeign('users_id');
        });
        Schema::dropIfExists('subscriptions');
    }
};
