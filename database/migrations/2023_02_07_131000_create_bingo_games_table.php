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
        Schema::create('bingo_games', function (Blueprint $table) {
            $table->id();
            $table->json('numbers')->nullable();
            $table->json('prizes')->nullable();
            $table->string('state')->nullable();
            $table->enum('level', ['bet', 'start', 'c1', 'c2', 'bingo', 'end'])->default('bet');
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
        Schema::dropIfExists('bingo_games');
    }
};
