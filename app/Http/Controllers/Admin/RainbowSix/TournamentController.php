<?php

namespace App\Http\Controllers\Admin\RainbowSix;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = Tournament::where('game', 'rainbowsix')
            ->paginate(5);

        return Inertia::render('R6/Dashboard/Tournaments/Index', compact('tournaments'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('R6/Dashboard/Tournaments/Create');
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
            'game' => 'required',
            'status' => 'required',
            'tier' => 'required',
            'name' => 'required',
            'prize' => 'required',
            'participants_number' => 'required',
            'location' => 'required',
            'winner' => 'nullable',
            'runner_up' => 'nullable',
            'view' => 'required'
        ]);

        Tournament::create($data);

        return redirect('/dashboard/rainbowsix/tournaments')->with('message', 'Tournament created!');;
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
        $tournament = Tournament::findOrFail($id);

        return Inertia::render('R6/Dashboard/Tournaments/Edit', compact('tournament'));
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
            'game' => 'required',
            'status' => 'required',
            'tier' => 'required',
            'name' => 'required',
            'prize' => 'required',
            'participants_number' => 'required',
            'location' => 'required',
            'winner' => 'nullable',
            'runner_up' => 'nullable',
            'view' => 'required'
        ]);

        Tournament::findOrFail($id)->update($data);

        return redirect('/dashboard/rainbowsix/tournaments')->with('message', 'Tournament updated!');;
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
