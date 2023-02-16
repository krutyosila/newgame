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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('referer')->nullable()->index();
            $table->enum('role', ['admin', 'customer', 'user', 'viewer', 'banned'])->default('user');
            $table->string('username')->unique();
            $table->string('password');
            $table->double('balance', 8, 2)->default(0)->index();
            $table->boolean('bayonet')->default(0);
            $table->boolean('limitless')->default(0);
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->json('detail')->nullable();
            $table->rememberToken();
            $table->timestamp('last_seen')->nullable();
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
        Schema::dropIfExists('users');
    }
};
