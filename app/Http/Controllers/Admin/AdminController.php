<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function newAdmin()
    {
        return Inertia::render('Admin/NewAdmin');
    }

    public function newEditor()
    {
        return Inertia::render('Admin/NewEditor');
    }

    public function makeAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        User::where('email', $request->email)->update([
            'admin' => true
        ]);

        return redirect()->route('index.dashboard')->with('message', 'New authorized admin');
    }

    public function makeEditor(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'game' => 'required'
        ]);

        User::where('email', $request->email)->update([
            'editor' => $request->game
        ]);

        return redirect()->route('index.dashboard')->with('message', 'New authorized editor');;
    }
}
