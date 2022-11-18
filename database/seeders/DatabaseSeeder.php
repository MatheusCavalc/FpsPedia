<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Team::create([
            'name' => 'MIBR',
            'players' => [
                'heat', //OU ENVIAR O ID DO JOGADOR
             ]
        ]);

        Player::create([
            'game' => 'valorant',
            'nickname' => 'heat',
            'name' => 'Olavo Marcelo',
            'nationality' => 'Brazil',
            'born' => '2003/02/07',
            'status' => true,
            'team_id' => 1
        ]);
    }
}
