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
        Schema::create('hasil_voting_fikes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('presma_id')
                ->nullable()
                ->constrained('presma_fikes')
                ->nullOnDelete();
            $table->foreignId('dpm_id')
                ->nullable()
                ->constrained('dpm_fikes')
                ->nullOnDelete();
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
        Schema::dropIfExists('hasil_voting_fikes');
    }
};