<?php

namespace App\Http\Controllers\Admin\Contribute;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ValidateContributeController extends Controller
{
    public function valorantContributes()
    {
        $players = Player::where('game', 'valorant')->where('view', false)->paginate(5);
        $teams = Team::where('game', 'valorant')->where('view', false)->paginate(5);

        return Inertia::render('Contribute/Admin/Valorant/Index', compact('players', 'teams'));
    }

    public function showPlayer($id)
    {
        $player = Player::with('team')->findOrFail($id);

        return Inertia::render('Contribute/Admin/Valorant/Player', compact('player'));
    }

    public function showTeam($id)
    {
        $team = Team::findOrFail($id);

        return Inertia::render('Contribute/Admin/Valorant/Team', compact('team'));
    }

    public function playerApprove($id)
    {
        Player::findOrFail($id)->update([
            'view' => true
        ]);

        return redirect()->route('dashboard.contribute.valorant')->with('message', 'Player approve');
    }

    public function destroyPlayer($id)
    {
        Player::find($id)->delete();

        return redirect()->route('dashboard.contribute.valorant')->with('message', 'Player delete');
    }

    public function teamApprove($id)
    {
        Team::findOrFail($id)->update([
            'view' => true
        ]);

        return redirect()->route('dashboard.contribute.valorant')->with('message', 'Team approve');
    }

    public function destroyTeam($id)
    {
        Team::find($id)->delete();

        return redirect()->route('dashboard.contribute.valorant')->with('message', 'Team delete');
    }

    public function csgoContributes()
    {
        $players = Player::where('game', 'csgo')->where('view', false)->paginate(5);
        $teams = Team::where('game', 'csgo')->where('view', false)->paginate(5);

        return Inertia::render('Contribute/Admin/Csgo/Index', compact('players', 'teams'));

    }

    public function showCsgoPlayer($id)
    {
        $player = Player::with('team')->findOrFail($id);

        return Inertia::render('Contribute/Admin/Csgo/Player', compact('player'));
    }

    public function showCsgoTeam($id)
    {
        $team = Team::findOrFail($id);

        return Inertia::render('Contribute/Admin/Csgo/Team', compact('team'));
    }

    public function rainbowsixContributes()
    {
        $players = Player::where('game', 'rainbowsix')->where('view', false)->paginate(5);
        $teams = Team::where('game', 'rainbowsix')->where('view', false)->paginate(5);

        return Inertia::render('Contribute/Admin/R6/Index', compact('players', 'teams'));
    }

    public function showRainbowsixPlayer($id)
    {
        $player = Player::with('team')->findOrFail($id);

        return Inertia::render('Contribute/Admin/Csgo/Player', compact('player'));
    }

    public function showRainbowsixTeam($id)
    {
        $team = Team::findOrFail($id);

        return Inertia::render('Contribute/Admin/Csgo/Team', compact('team'));
    }
}
