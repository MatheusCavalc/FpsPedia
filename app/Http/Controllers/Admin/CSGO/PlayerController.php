<?php

namespace App\Http\Controllers\Admin\CSGO;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::where('game', 'csgo')
                            ->paginate(5);

        return Inertia::render('Csgo/Dashboard/Players/Index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::select('id', 'name')
                     ->where('game', 'csgo')
                     ->where('view', true)
                     ->limit(15)
                     ->get();

        return Inertia::render('Csgo/Dashboard/Players/Create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        return redirect('/dashboard/csgo/players');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //nao utilizado
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::findOrFail($id);

        return Inertia::render('Csgo/Dashboard/Players/Edit', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        Player::findOrFail($id)->update($data);

        return redirect('/dashboard/csgo/players');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Nao utilizado
    }
}
