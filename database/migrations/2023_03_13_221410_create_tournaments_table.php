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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();

            $table->enum('game', ['valorant', 'csgo', 'rainbowsix']);
            $table->enum('status', ['Upcoming', 'Ongoing', 'Completed']);

            $table->enum('tier', ['S-Tier', 'A-Tier', 'B-Tier', 'C-Tier']);
            $table->string('name');
            $table->string('prize');
            $table->string('participants_number');
            $table->string('location');
            $table->string('winner')->nullable();
            $table->string('runner_up')->nullable();

            $table->boolean('view')->default(false);
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
        Schema::dropIfExists('tournaments');
    }
};
