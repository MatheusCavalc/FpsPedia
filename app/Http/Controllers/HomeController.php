<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function valorantAllPlayers()
    {
        $players = Player::where('game', 'valorant')
                         ->where('view', true)
                         ->with('team')
                         ->get();

        //dd($players);

        return Inertia::render('Valorant/Players', compact('players'));
    }

    public function valorantPlayer($id)
    {
        $player = Player::with('team')->findOrFail($id);

        return Inertia::render('Valorant/Player', compact('player'));
    }

    public function valorantAllTeams()
    {
        $teams = Team::where('game', 'valorant')
                         ->where('view', true)
                         ->get();

        return Inertia::render('Valorant/Teams', compact('teams'));
    }

    public function valorantTeam($id)
    {
        $team = Team::findOrFail($id);

        return Inertia::render('Valorant/Team', compact('team'));
    }

}
