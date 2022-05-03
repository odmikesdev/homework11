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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id');
            $table->foreignId('user_id');
            $table->timestamps();
        });
        Schema::create('comments_has_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comments_id');
            $table->foreignId('cards_id');

            $table->foreign('comments_id')->references('id')->on('comments');
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
        Schema::table('comments_has_cards', function (Blueprint $table) {
            $table->dropForeign('comments_id');
            $table->dropForeign('cards_id');
        });

        Schema::dropIfExists('comments_has_cards');
        Schema::dropIfExists('comments');
    }
};
