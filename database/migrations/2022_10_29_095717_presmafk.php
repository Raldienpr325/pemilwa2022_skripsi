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
        Schema::Create('presmafk', function (Blueprint $table) {
            $table->id();
            $table->integer('nourut');
            $table->string('nama');
            $table->string('nama_wakil');
            $table->integer('angkatan');
            $table->string('prodi');
            $table->string('foto');
            $table->string('foto_wakil');
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
        Schema::dropIfExists('presma_fk');
    }
};
