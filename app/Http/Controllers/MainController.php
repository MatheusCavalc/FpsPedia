<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index()
    {
        return Inertia::render('Home');
    }

    public function valorant()
    {
        $id = 'valorant';
        $players = Player::where('game', 'valorant')
            ->where('view', true)
            ->with('team')
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        $teams = Team::where('game', 'valorant')
            ->where('view', true)
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        $tournaments = Tournament::where('game', 'valorant')
            ->where('view', true)
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return Inertia::render('Valorant/Index', compact('id', 'players', 'teams', 'tournaments'));
    }

    public function csgo()
    {
        $id = 'csgo';
        $players = Player::where('game', 'csgo')
            ->where('view', true)
            ->with('team')
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        $teams = Team::where('game', 'csgo')
            ->where('view', true)
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        $tournaments = Tournament::where('game', 'csgo')
            ->where('view', true)
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return Inertia::render('Csgo/Index', compact('id', 'players', 'teams', 'tournaments'));
    }

    public function rainbowsix()
    {
        $id = 'rainbowsix';
        $players = Player::where('game', 'rainbowsix')
            ->where('view', true)
            ->with('team')
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        $teams = Team::where('game', 'rainbowsix')
            ->where('view', true)
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        $tournaments = Tournament::where('game', 'rainbowsix')
            ->where('view', true)
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return Inertia::render('R6/Index', compact('id', 'players', 'teams', 'tournaments'));
    }

    public function dashboard()
    {
        return Inertia::render('Dashboard');
    }
}
