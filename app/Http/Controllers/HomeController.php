<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function valorantAllPlayers()
    {
        $players = Player::where('game', 'valorant')->get();

        //dd($players[0]->team->name);

        return Inertia::render('Valorant/Players', compact('players'));
    }

    public function valorantPlayer($id)
    {
        $player = Player::findOrFail($id);

        return Inertia::render('Valorant/Player', compact('player'));
    }
}
