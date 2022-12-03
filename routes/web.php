<?php

use App\Http\Controllers\MainController;


use App\Http\Controllers\Valorant\PlayerController;
use App\Http\Controllers\Valorant\TeamController;
use Illuminate\Support\Facades\Route;

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

//Home - Paginas dos visitantes
Route::get('/', [MainController::class, 'index'])->name('index');
Route::controller(MainController::class)->name('index.')->group(function () {
    Route::get('/valorant/Home', 'valorant')->name('valorant');
    Route::get('/csgo/Home', 'valorant')->name('csgo');
    Route::get('/rainbowsix/Home', 'valorant')->name('rainbowsix');
    Route::get('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
});




















//Dashboard - Paginas de Editores e Administradores
//Players Valorant
Route::controller(PlayerController::class)->prefix('dashboard/valorant')->name('dashboard.valorant.players.')->group(function () {
    Route::get('/players', 'index')->name('index');//todos os jogadores
    Route::get('/players/create', 'create')->name('create');//ir pra tela de criacao -- dashboard
    Route::post('/players', 'store')->name('store');
    //Route::get('/players/{id}', 'show')->name('show');
    Route::get('/players/edit/{id}', 'edit')->name('edit');
    Route::put('/players/update/{id}', 'update')->name('update');
    //Route::delete('/players/{id}', 'destroy')->name('destroy');
});

//Teams Valorant
Route::controller(TeamController::class)->prefix('dashboard/valorant')->name('dashboard.valorant.teams.')->group(function () {
    Route::get('/teams', 'index')->name('index');//todos os jogadores
    Route::get('/teams/create', 'create')->name('create');//ir pra tela de criacao -- dashboard
    Route::post('/teams', 'store')->name('store');
    //Route::get('/teams/{id}', 'show')->name('show');
    Route::get('/teams/edit/{id}', 'edit')->name('edit');
    Route::put('/teams/update/{id}', 'update')->name('update');
    //Route::delete('/teams/{id}', 'destroy')->name('destroy');
});


require __DIR__.'/auth.php';
