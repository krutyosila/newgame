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
        Schema::create('bingo_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bingo_room_id');
            $table->unsignedBigInteger('bingo_game_id');
            $table->enum('type', ['normal', 'auto', 'last'])->default('normal');
            $table->unsignedBigInteger('card');
            $table->timestamps();
            $table->unique(['bingo_game_id', 'bingo_room_id', 'card']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bingo_room_id')->references('id')->on('bingo_rooms')->onDelete('cascade');
            $table->foreign('bingo_game_id')->references('id')->on('bingo_games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bingo_transactions');
    }
};
