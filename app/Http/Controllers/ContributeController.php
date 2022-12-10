<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContributeController extends Controller
{
    public function player($game)
    {
        $teams = Team::select('id', 'name')->where('game', $game)->limit(15)->get();

        return Inertia::render('Contribute/Player', compact('game', 'teams'));
    }

    public function storePlayer(Request $request)
    {
        $data = $request->validate([
            'nickname' => 'required',
            'name' => 'required',
            'nationality' => 'required',
            'born' => 'required',
            'status' => 'required',
            'team_id' => 'required',
            'game' => 'required',
            'view' => 'required'
        ]);

        $data['team_id'] = $data['team_id']['id'];

        Player::create($data);

        return redirect('/'. $request->game .'/Home')->with('message', 'Player sent to editors, thank you very much for you cooperation');
    }

    public function team($game)
    {
        return Inertia::render('Contribute/Team', compact('game'));
    }

    public function storeTeam(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:teams',
            'region' => 'required',
            'sub_region' => 'required',
            'status' => 'required',
            'location' => 'required',
            'overview' => 'required',
            'game' => 'required',
            'view' => 'required'
        ]);

        Team::create($data);

        return redirect('/'. $request->game .'/Home')->with('message', 'Team sent to editors, thank you very much for you cooperation');
    }
}
