<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bingo_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('price')->default('0');
            $table->integer('c1')->default('0');
            $table->integer('c2')->default('0');
            $table->integer('bingo')->default('0');
            $table->integer('rompers')->default('0');
            $table->integer('first5')->default('0');
            $table->integer('first10')->default('0');
            $table->smallInteger('minimum')->default(1);
            $table->string('color', 7)->default('#000000');
            $table->boolean('state')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bingo_rooms');
    }
};
