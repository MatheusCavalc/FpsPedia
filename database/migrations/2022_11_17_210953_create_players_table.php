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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->enum('game', ['valorant', 'csgo', 'rainbowsix']);

            $table->string('nickname');
            $table->string('name');
            $table->string('nationality');
            $table->date('born');
            $table->enum('status', ['active', 'inactive', 'retired']);

            $table->foreignId('team_id')->constrained();

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
        Schema::dropIfExists('players');
    }
};
