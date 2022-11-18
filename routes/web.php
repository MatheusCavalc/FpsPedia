<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\Valorant\PlayerController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index']);

Route::name('index.')->group(function () {
    Route::get('/valorant/Home', [MainController::class, 'valorant'])->name('valorant');
    Route::get('/csgo/Home', [MainController::class, 'csgo'])->name('csgo');
    Route::get('/rainbowsix/Home', [MainController::class, 'rainbowsix'])->name('rainbowsix');
});


Route::name('valorant.')->group(function () {
    Route::get('/valorant/players', [PlayerController::class, 'index'])->name('players.index');
});













Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
