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
        Schema::create('token_users', function (Blueprint $table) {
            $table->id();
            $table->string('token');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('given_name')->nullable();
            $table->string('family_name')->nullable();
            $table->string('NIM');
            $table->string('hd');
            $table->integer('password');
            $table->string('prodi')->nullable();
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
        Schema::dropIfExists('token_users');
    }
};
