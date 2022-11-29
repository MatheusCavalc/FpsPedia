<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    public function index()
    {
        return Inertia::render('Home');
    }

    public function valorant()
    {
        $id = 'Valorant';
        return Inertia::render('Valorant/Index', compact('id'));
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
