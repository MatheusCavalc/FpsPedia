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

    public function csgoAllPlayers()
    {
        $players = Player::where('game', 'csgo')
                         ->where('view', true)
                         ->with('team')
                         ->get();

        return Inertia::render('Csgo/Players', compact('players'));
    }

    public function csgoPlayer($id)
    {
        $player = Player::with('team')->findOrFail($id);

        return Inertia::render('Csgo/Player', compact('player'));
    }

    public function csgoAllTeams()
    {
        $teams = Team::where('game', 'csgo')
                         ->where('view', true)
                         ->get();

        return Inertia::render('Csgo/Teams', compact('teams'));
    }

    public function csgoTeam($id)
    {
        $team = Team::findOrFail($id);

        return Inertia::render('Csgo/Team', compact('team'));
    }

    public function rainbowsixAllPlayers()
    {
        $players = Player::where('game', 'rainbowsix')
                         ->where('view', true)
                         ->with('team')
                         ->get();

        return Inertia::render('R6/Players', compact('players'));
    }

    public function rainbowsixPlayer($id)
    {
        $player = Player::with('team')->findOrFail($id);

        return Inertia::render('R6/Player', compact('player'));
    }

    public function rainbowsixAllTeams()
    {
        $teams = Team::where('game', 'rainbowsix')
                         ->where('view', true)
                         ->get();

        return Inertia::render('R6/Teams', compact('teams'));
    }

    public function rainbowsixTeam($id)
    {
        $team = Team::findOrFail($id);

        return Inertia::render('R6/Team', compact('team'));
    }

}
