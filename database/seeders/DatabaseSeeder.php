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
            'overview' => 'MIBR (also known as Made in Brazil) is a Brazilian professional esports organization owned by Immortals Gaming Club.',
            'view' => true
        ]);

        Team::create([
            'game' => 'csgo',
            'name' => '00 NATION',
            'region' => 'EMEA',
            'sub_region' => 'Europe',
            'status' => 'active',
            'location' => 'Norway',
            'overview' => '00 Nation, also known as ZeroZero Nation, is an esports organization acquired by Nordavind on July 6, 2021.',
            'view' => true
        ]);

        Player::create([
            'game' => 'valorant',
            'nickname' => 'heat',
            'name' => 'Olavo Marcelo',
            'nationality' => 'Brazil',
            'overview' => 'Olavo "heat" Marcelo (born February 7, 2003) is a Brazilian player who is currently playing for MIBR.',
            'born' => '2003/02/07',
            'status' => 'active',
            'team_id' => 1,
            'view' => true
        ]);

        Player::create([
            'game' => 'csgo',
            'nickname' => 'coldzera',
            'name' => 'Marcelo Augusto David',
            'nationality' => 'Brazil',
            'overview' => 'Marcelo "coldzera" David (born October 31, 1994) is a Brazilian professional Counter-Strike: Global Offensive player for 00 Nation. He is widely considered as one of the best CS:GO players of all time, having been ranked first by HLTV two years in a row in 2016 and 2017. As of November 2021, coldzera resides in Portugal.',
            'born' => '1998/10/31',
            'status' => 'active',
            'alternate_nicks' => 'cold, gelado',
            'earnings' => 1025619,
            'cs_roles' => [
                'rifler',
                'lurker',
                'in-game leader'
            ],
            'team_id' => 2,
            'view' => true
        ]);


    }
}
