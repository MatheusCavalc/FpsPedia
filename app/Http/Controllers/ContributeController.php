<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class ContributeController extends Controller
{
    public function player($game)
    {
        $teams = Team::select('id', 'name')
                     ->where('game', $game)
                     ->where('view', true)
                     ->get();

        return Inertia::render('Contribute/Player', compact('game', 'teams'));
    }

    public function storePlayer(Request $request)
    {
        $data = $request->validate([
            'nickname' => 'required|max:255',
            'name' => 'required|max:255',
            'nationality' => 'required|max:255',
            'overview' => 'required',
            'born' => 'required|date',
            'status' => 'required',
            'cs_roles' => 'nullable|array',
            'earnings' => 'nullable|max:10',
            'alternate_nicks' => 'nullable|string|max:255',
            'team_id' => 'nullable|array',
            'game' => 'required',
            'view' => 'required',
            'media' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:1024'
        ]);

        $data['team_id'] = $data['team_id']['id'];

        if ($data['media']) {
            $data['media'] = FacadesRequest::file('media')->store('players', 'public');
        }

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
            'name' => 'required|max:255',
            'region' => 'required',
            'sub_region' => 'required',
            'status' => 'required',
            'location' => 'required|max:255',
            'overview' => 'required',
            'game' => 'required',
            'view' => 'required',
            'founders' => 'nullable|string|max:255',
            'ceo' => 'nullable|string|max:255',
            'earnings' => 'nullable|string|max:255',
            'media' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:1024'
        ]);

        if ($data['media']) {
            $data['media'] = FacadesRequest::file('media')->store('teams', 'public');
        }

        Team::create($data);

        return redirect('/'. $request->game .'/Home')->with('message', 'Team sent to editors, thank you very much for you cooperation');
    }
}
