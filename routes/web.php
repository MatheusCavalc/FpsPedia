<?php

use App\Http\Controllers\Admin\Contribute\ValidateContributeController;
use App\Http\Controllers\ContributeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;


use App\Http\Controllers\Admin\Valorant\PlayerController;
use App\Http\Controllers\Admin\Valorant\TeamController;
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
    Route::get('/csgo/Home', 'csgo')->name('csgo');
    Route::get('/rainbowsix/Home', 'rainbowsix')->name('rainbowsix');
    Route::get('/dashboard', 'dashboard')->middleware(['auth', 'editor'])->name('dashboard');
});

Route::controller(HomeController::class)->name('home.')->group(function () {
    Route::get('/valorant/players', 'valorantAllPlayers')->name('valorant.players');
    Route::get('/valorant/player/{id}', 'valorantPlayer')->name('valorant.player');
    Route::get('/valorant/teams', 'valorantAllTeams')->name('valorant.teams');
    Route::get('/valorant/team/{id}', 'valorantTeam')->name('valorant.team');


});



















//Dashboard - Paginas de Editores e Administradores
//Players Valorant
Route::controller(PlayerController::class)->middleware(['auth', 'editor'])->prefix('dashboard/valorant')->name('dashboard.valorant.players.')->group(function () {
    Route::get('/players', 'index')->name('index');//todos os jogadores
    Route::get('/players/create', 'create')->name('create');//ir pra tela de criacao -- dashboard
    Route::post('/players', 'store')->name('store');
    //Route::get('/players/{id}', 'show')->name('show');
    Route::get('/players/edit/{id}', 'edit')->name('edit');
    Route::put('/players/update/{id}', 'update')->name('update');
    //Route::delete('/players/{id}', 'destroy')->name('destroy');
});

//Teams Valorant
Route::controller(TeamController::class)->middleware(['auth', 'editor'])->prefix('dashboard/valorant')->name('dashboard.valorant.teams.')->group(function () {
    Route::get('/teams', 'index')->name('index');//todos os jogadores
    Route::get('/teams/create', 'create')->name('create');//ir pra tela de criacao -- dashboard
    Route::post('/teams', 'store')->name('store');
    //Route::get('/teams/{id}', 'show')->name('show');
    Route::get('/teams/edit/{id}', 'edit')->name('edit');
    Route::put('/teams/update/{id}', 'update')->name('update');
    //Route::delete('/teams/{id}', 'destroy')->name('destroy');
});


//Contribute for user
Route::controller(ContributeController::class)->middleware(['auth'])->prefix('/contribute')->name('contribute.')->group(function () {
    Route::get('/{game}/player', 'player')->name('player');
    Route::post('/player', 'storePlayer')->name('player.store');

    Route::get('/{game}/team', 'team')->name('team');
    Route::post('/team', 'storeTeam')->name('team.store');
});

//Contribute for admin
Route::controller(ValidateContributeController::class)->middleware(['auth', 'editor'])->prefix('dashboard/contribute')->name('dashboard.contribute.')->group(function () {
    Route::get('/valorant', 'valorantContributes')->name('valorant');
    Route::get('/valorant/player/{id}', 'showPlayer')->name('valorant.player');
    Route::get('/valorant/team/{id}', 'showTeam')->name('valorant.team');


    Route::put('/valorant/player/approve/{id}', 'playerApprove')->name('valorant.player.approve');
    Route::delete('/valorant/player/delete/{id}', 'destroyPlayer')->name('valorant.player.destroy');

    Route::put('/valorant/team/approve/{id}', 'teamApprove')->name('valorant.team.approve');
    Route::delete('/valorant/team/delete/{id}', 'destroyTeam')->name('valorant.team.destroy');


    Route::get('/csgo', 'csgoContributes')->name('csgo');



    Route::get('/rainbowsix', 'rainbowsixContributes')->name('rainbowsix');
});

require __DIR__.'/auth.php';
