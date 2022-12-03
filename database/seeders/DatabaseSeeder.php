<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'admin' => true,
        ]);

        Team::create([
            'game' => 'valorant',
            'name' => 'MIBR',
            'region' => 'America',
            'sub_region' => 'Brazil',
            'status' => 'active',
            'location' => 'United States',
            'overview' => 'MIBR (also known as Made in Brazil) is a Brazilian professional esports organization owned by Immortals Gaming Club.'
        ]);

        Player::create([
            'game' => 'valorant',
            'nickname' => 'heat',
            'name' => 'Olavo Marcelo',
            'nationality' => 'Brazil',
            'born' => '2003/02/07',
            'status' => 'active',
            'team_id' => 1
        ]);
    }
}
