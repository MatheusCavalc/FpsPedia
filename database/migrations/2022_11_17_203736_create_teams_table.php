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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->enum('game', ['valorant', 'csgo', 'rainbowsix']);

            $table->string('name');
            $table->string('region');
            $table->string('sub_region');
            $table->enum('status', ['active', 'inactive']);
            $table->string('location');
            $table->longText('overview');

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
        Schema::dropIfExists('teams');
    }
};
