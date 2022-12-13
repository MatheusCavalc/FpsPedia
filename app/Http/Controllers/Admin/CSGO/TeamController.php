<?php

namespace App\Http\Controllers\Admin\CSGO;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::where('game', 'csgo')
                            ->paginate(5);

        return Inertia::render('Csgo/Dashboard/Teams/Index', compact('teams'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Csgo/Dashboard/Teams/Create');
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
            'name' => 'required|max:255',
            'region' => 'required',
            'sub_region' => 'required',
            'status' => 'required',
            'location' => 'required|max:255',
            'overview' => 'required',
            'game' => 'required',
            'view' => 'required',
            'media' => 'image|mimes:jpg,png,jpeg|max:1024'
        ]);

        $data['media'] = FacadesRequest::file('media')->store('teams', 'public');

        Team::create($data);

        return redirect('/dashboard/csgo/teams')->with('message', 'Team created!');;
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
        $team = Team::findOrFail($id);
        $image = asset('storage/'. $team->media);

        return Inertia::render('Csgo/Dashboard/Teams/Edit', compact('team', 'image'));
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
            'name' => 'required|max:255',
            'region' => 'required',
            'sub_region' => 'required',
            'status' => 'required',
            'location' => 'required|max:255',
            'overview' => 'required',
            'game' => 'required',
            'view' => 'required',
            'media' => 'max:1024'
        ]);

        $data['media'] = $request->media;

        if(FacadesRequest::file('media')) {
            Storage::delete('public/teams/'. $request->media);
            $data['media'] = FacadesRequest::file('media')->store('teams', 'public');
        }

        Team::findOrFail($id)->update($data);

        return redirect('/dashboard/csgo/teams')->with('message', 'Team updated!');;
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
