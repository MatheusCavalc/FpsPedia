<?php

namespace App\Http\Controllers;

use App\Models\Player;
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
        $players = Player::where('game', 'valorant')
                            ->orderBy('updated_at', 'desc')
                            ->take(5)
                            ->get();

        //dd($players);

        return Inertia::render('Valorant/Index', compact('players'));
    }

    public function csgo()
    {
        $id = 'CSGO';
        return Inertia::render('Csgo/Index', compact('id'));
    }

    public function rainbowsix()
    {
        $id = 'Rainbow Six';
        return Inertia::render('R6/Index', compact('id'));
    }

    public function dashboard()
    {
        return Inertia::render('Dashboard');
    }
}
