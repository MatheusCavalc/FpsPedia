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
            $table->longText('overview');

            //nullables
            $table->string('media')->nullable();
            $table->foreignId('team_id')->nullable()->constrained();
            $table->string('alternate_nicks')->nullable();
            $table->string('earnings')->nullable();

            //for csgo players
            $table->string('cs_roles')->nullable();

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
        Schema::dropIfExists('players');
    }
};
