<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use App\Models\Tournament;
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

        $trendings = Player::where('game', 'valorant')
                            ->where('view', true)
                            ->with('team')
                            ->orderBy('updated_at', 'desc')
                            ->take(5)
                            ->get();

        return Inertia::render('Valorant/Players', compact('players', 'trendings'));
    }

    public function valorantPlayer($id)
    {
        $player = Player::with('team')->findOrFail($id);

        $image = asset('storage/'. $player->media);

        $trendings = Player::where('game', 'valorant')
                            ->where('view', true)
                            ->with('team')
                            ->orderBy('updated_at', 'desc')
                            ->take(5)
                            ->get();

        return Inertia::render('Valorant/Player', compact('player', 'trendings', 'image'));
    }

    public function valorantAllTeams()
    {
        $teams = Team::where('game', 'valorant')
                         ->where('view', true)
                         ->get();

        $trendings = Player::where('game', 'valorant')
                            ->where('view', true)
                            ->with('team')
                            ->orderBy('updated_at', 'desc')
                            ->take(5)
                            ->get();

        return Inertia::render('Valorant/Teams', compact('teams', 'trendings'));
    }

    public function valorantTeam($id)
    {
        $team = Team::findOrFail($id);

        $image = asset('storage/'. $team->media);

        $players = Player::where('view', true)
                         ->where('team_id', $team->id)
                         ->get();

        $trendings = Player::where('game', 'valorant')
                            ->where('view', true)
                            ->with('team')
                            ->orderBy('updated_at', 'desc')
                            ->take(5)
                            ->get();

        return Inertia::render('Valorant/Team', compact('team', 'trendings', 'image', 'players'));
    }

    public function valorantAllTournaments()
    {
        $tournaments = Tournament::where('game', 'valorant')
                         ->where('view', true)
                         ->get();

        $trendings = Player::where('game', 'csgo')
                         ->where('view', true)
                         ->with('team')
                         ->orderBy('updated_at', 'desc')
                         ->take(5)
                         ->get();

        return Inertia::render('Valorant/Tournaments', compact('tournaments', 'trendings'));
    }

    public function csgoAllPlayers()
    {
        $players = Player::where('game', 'csgo')
                         ->where('view', true)
                         ->with('team')
                         ->get();

        $trendings = Player::where('game', 'csgo')
                         ->where('view', true)
                         ->with('team')
                         ->orderBy('updated_at', 'desc')
                         ->take(5)
                         ->get();

        return Inertia::render('Csgo/Players', compact('players', 'trendings'));
    }

    public function csgoPlayer($id)
    {
        $player = Player::with('team')->findOrFail($id);

        $image = asset('storage/'. $player->media);

        $trendings = Player::where('game', 'csgo')
                            ->where('view', true)
                            ->with('team')
                            ->orderBy('updated_at', 'desc')
                            ->take(5)
                            ->get();

        return Inertia::render('Csgo/Player', compact('player', 'trendings', 'image'));
    }

    public function csgoAllTeams()
    {
        $teams = Team::where('game', 'csgo')
                         ->where('view', true)
                         ->get();

        $trendings = Player::where('game', 'csgo')
                         ->where('view', true)
                         ->with('team')
                         ->orderBy('updated_at', 'desc')
                         ->take(5)
                         ->get();

        return Inertia::render('Csgo/Teams', compact('teams', 'trendings'));
    }

    public function csgoTeam($id)
    {
        $team = Team::findOrFail($id);

        $image = asset('storage/'. $team->media);

        $players = Player::where('view', true)
                         ->where('team_id', $team->id)
                         ->get();

        $trendings = Player::where('game', 'csgo')
                            ->where('view', true)
                            ->with('team')
                            ->orderBy('updated_at', 'desc')
                            ->take(5)
                            ->get();

        return Inertia::render('Csgo/Team', compact('team', 'trendings', 'image', 'players'));
    }

    public function csgoAllTournaments()
    {
        $tournaments = Tournament::where('game', 'csgo')
                         ->where('view', true)
                         ->get();

        $trendings = Player::where('game', 'csgo')
                         ->where('view', true)
                         ->with('team')
                         ->orderBy('updated_at', 'desc')
                         ->take(5)
                         ->get();

        return Inertia::render('Csgo/Tournaments', compact('tournaments', 'trendings'));
    }

    public function rainbowsixAllPlayers()
    {
        $players = Player::where('game', 'rainbowsix')
                         ->where('view', true)
                         ->with('team')
                         ->get();

        $trendings = Player::where('game', 'rainbowsix')
                         ->where('view', true)
                         ->with('team')
                         ->orderBy('updated_at', 'desc')
                         ->take(5)
                         ->get();

        return Inertia::render('R6/Players', compact('players', 'trendings'));
    }

    public function rainbowsixPlayer($id)
    {
        $player = Player::with('team')->findOrFail($id);

        $image = asset('storage/'. $player->media);

        $trendings = Player::where('game', 'rainbowsix')
                            ->where('view', true)
                            ->with('team')
                            ->orderBy('updated_at', 'desc')
                            ->take(5)
                            ->get();

        return Inertia::render('R6/Player', compact('player', 'trendings', 'image'));
    }

    public function rainbowsixAllTeams()
    {
        $teams = Team::where('game', 'rainbowsix')
                         ->where('view', true)
                         ->get();

        $trendings = Player::where('game', 'rainbowsix')
                         ->where('view', true)
                         ->with('team')
                         ->orderBy('updated_at', 'desc')
                         ->take(5)
                         ->get();

        return Inertia::render('R6/Teams', compact('teams', 'trendings'));
    }

    public function rainbowsixTeam($id)
    {
        $team = Team::findOrFail($id);

        $image = asset('storage/'. $team->media);

        $players = Player::where('view', true)
                         ->where('team_id', $team->id)
                         ->get();

        $trendings = Player::where('game', 'rainbowsix')
                            ->where('view', true)
                            ->with('team')
                            ->orderBy('updated_at', 'desc')
                            ->take(5)
                            ->get();

        return Inertia::render('R6/Team', compact('team', 'trendings', 'image', 'players'));
    }

    public function rainbowsixAllTournaments()
    {
        $tournaments = Tournament::where('game', 'rainbowsix')
                         ->where('view', true)
                         ->get();

        $trendings = Player::where('game', 'csgo')
                         ->where('view', true)
                         ->with('team')
                         ->orderBy('updated_at', 'desc')
                         ->take(5)
                         ->get();

        return Inertia::render('R6/Tournaments', compact('tournaments', 'trendings'));
    }

}
