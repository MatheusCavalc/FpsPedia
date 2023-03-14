<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Contribute\ValidateContributeController;
use App\Http\Controllers\ContributeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;

use App\Http\Controllers\Admin\Valorant\PlayerController;
use App\Http\Controllers\Admin\Valorant\TeamController;
use App\Http\Controllers\Admin\Valorant\TournamentController as ValorantTournamentController;

use App\Http\Controllers\Admin\CSGO\PlayerController as CSGOPlayerController;
use App\Http\Controllers\Admin\CSGO\TeamController as CSGOTeamController;
use App\Http\Controllers\Admin\CSGO\TournamentController;

use App\Http\Controllers\Admin\RainbowSix\PlayerController as RainbowSixPlayerController;
use App\Http\Controllers\Admin\RainbowSix\TeamController as RainbowSixTeamController;
use App\Http\Controllers\Admin\RainbowSix\TournamentController as RainbowSixTournamentController;
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
    Route::get('/dashboard', 'dashboard')->middleware(['auth', 'dashboard'])->name('dashboard');
});

Route::controller(HomeController::class)->name('home.')->group(function () {
    Route::get('/valorant/players', 'valorantAllPlayers')->name('valorant.players');
    Route::get('/valorant/player/{id}', 'valorantPlayer')->name('valorant.player');
    Route::get('/valorant/teams', 'valorantAllTeams')->name('valorant.teams');
    Route::get('/valorant/team/{id}', 'valorantTeam')->name('valorant.team');

    Route::get('/valorant/tournaments', 'valorantAllTournaments')->name('valorant.tournaments');

    Route::get('/csgo/players', 'csgoAllPlayers')->name('csgo.players');
    Route::get('/csgo/player/{id}', 'csgoPlayer')->name('csgo.player');
    Route::get('/csgo/teams', 'csgoAllTeams')->name('csgo.teams');
    Route::get('/csgo/team/{id}', 'csgoTeam')->name('csgo.team');

    Route::get('/csgo/tournaments', 'csgoAllTournaments')->name('csgo.tournaments');

    Route::get('/rainbowsix/players', 'rainbowsixAllPlayers')->name('rainbowsix.players');
    Route::get('/rainbowsix/player/{id}', 'rainbowsixPlayer')->name('rainbowsix.player');
    Route::get('/rainbowsix/teams', 'rainbowsixAllTeams')->name('rainbowsix.teams');
    Route::get('/rainbowsix/team/{id}', 'rainbowsixTeam')->name('rainbowsix.team');

    Route::get('/rainbowsix/tournaments', 'rainbowsixAllTournaments')->name('rainbowsix.tournaments');
});



















//Dashboard - Paginas de Editores e Administradores
//Players Valorant
Route::controller(PlayerController::class)->middleware(['auth', 'valorant_editor'])->prefix('dashboard/valorant')->name('dashboard.valorant.players.')->group(function () {
    Route::get('/players', 'index')->name('index');//todos os jogadores
    Route::get('/players/create', 'create')->name('create');//ir pra tela de criacao -- dashboard
    Route::post('/players', 'store')->name('store');
    //Route::get('/players/{id}', 'show')->name('show');
    Route::get('/players/edit/{id}', 'edit')->name('edit');
    Route::put('/players/update/{id}', 'update')->name('update');
    //Route::delete('/players/{id}', 'destroy')->name('destroy');
});

//Teams Valorant
Route::controller(TeamController::class)->middleware(['auth', 'valorant_editor'])->prefix('dashboard/valorant')->name('dashboard.valorant.teams.')->group(function () {
    Route::get('/teams', 'index')->name('index');//todos os jogadores
    Route::get('/teams/create', 'create')->name('create');//ir pra tela de criacao -- dashboard
    Route::post('/teams', 'store')->name('store');
    //Route::get('/teams/{id}', 'show')->name('show');
    Route::get('/teams/edit/{id}', 'edit')->name('edit');
    Route::put('/teams/update/{id}', 'update')->name('update');
    //Route::delete('/teams/{id}', 'destroy')->name('destroy');
});

//Tournaments Valorant
Route::controller(ValorantTournamentController::class)->middleware(['auth', 'valorant_editor'])->prefix('dashboard/valorant')->name('dashboard.valorant.tournaments.')->group(function () {
    Route::get('/tournaments', 'index')->name('index');//todos os jogadores
    Route::get('/tournaments/create', 'create')->name('create');//ir pra tela de criacao -- dashboard
    Route::post('/tournaments', 'store')->name('store');
    //Route::get('/tournaments/{id}', 'show')->name('show');
    Route::get('/tournaments/edit/{id}', 'edit')->name('edit');
    Route::put('/tournaments/update/{id}', 'update')->name('update');
    //Route::delete('/tournaments/{id}', 'destroy')->name('destroy');
});

//Players CSGO
Route::controller(CSGOPlayerController::class)->middleware(['auth', 'csgo_editor'])->prefix('dashboard/csgo')->name('dashboard.csgo.players.')->group(function () {
    Route::get('/players', 'index')->name('index');//todos os jogadores
    Route::get('/players/create', 'create')->name('create');//ir pra tela de criacao -- dashboard
    Route::post('/players', 'store')->name('store');
    //Route::get('/players/{id}', 'show')->name('show');
    Route::get('/players/edit/{id}', 'edit')->name('edit');
    Route::put('/players/update/{id}', 'update')->name('update');
    //Route::delete('/players/{id}', 'destroy')->name('destroy');
});

//Teams CSGO
Route::controller(CSGOTeamController::class)->middleware(['auth', 'csgo_editor'])->prefix('dashboard/csgo')->name('dashboard.csgo.teams.')->group(function () {
    Route::get('/teams', 'index')->name('index');//todos os jogadores
    Route::get('/teams/create', 'create')->name('create');//ir pra tela de criacao -- dashboard
    Route::post('/teams', 'store')->name('store');
    //Route::get('/teams/{id}', 'show')->name('show');
    Route::get('/teams/edit/{id}', 'edit')->name('edit');
    Route::put('/teams/update/{id}', 'update')->name('update');
    //Route::delete('/teams/{id}', 'destroy')->name('destroy');
});

//Tournaments CSGO
Route::controller(TournamentController::class)->middleware(['auth', 'csgo_editor'])->prefix('dashboard/csgo')->name('dashboard.csgo.tournaments.')->group(function () {
    Route::get('/tournaments', 'index')->name('index');//todos os jogadores
    Route::get('/tournaments/create', 'create')->name('create');//ir pra tela de criacao -- dashboard
    Route::post('/tournaments', 'store')->name('store');
    //Route::get('/tournaments/{id}', 'show')->name('show');
    Route::get('/tournaments/edit/{id}', 'edit')->name('edit');
    Route::put('/tournaments/update/{id}', 'update')->name('update');
    //Route::delete('/tournaments/{id}', 'destroy')->name('destroy');
});

//Players R6
Route::controller(RainbowSixPlayerController::class)->middleware(['auth', 'rainbowsix_editor'])->prefix('dashboard/rainbowsix')->name('dashboard.rainbowsix.players.')->group(function () {
    Route::get('/players', 'index')->name('index');//todos os jogadores
    Route::get('/players/create', 'create')->name('create');//ir pra tela de criacao -- dashboard
    Route::post('/players', 'store')->name('store');
    //Route::get('/players/{id}', 'show')->name('show');
    Route::get('/players/edit/{id}', 'edit')->name('edit');
    Route::put('/players/update/{id}', 'update')->name('update');
    //Route::delete('/players/{id}', 'destroy')->name('destroy');
});

//Teams R6
Route::controller(RainbowSixTeamController::class)->middleware(['auth', 'rainbowsix_editor'])->prefix('dashboard/rainbowsix')->name('dashboard.rainbowsix.teams.')->group(function () {
    Route::get('/teams', 'index')->name('index');//todos os jogadores
    Route::get('/teams/create', 'create')->name('create');//ir pra tela de criacao -- dashboard
    Route::post('/teams', 'store')->name('store');
    //Route::get('/teams/{id}', 'show')->name('show');
    Route::get('/teams/edit/{id}', 'edit')->name('edit');
    Route::put('/teams/update/{id}', 'update')->name('update');
    //Route::delete('/teams/{id}', 'destroy')->name('destroy');
});

//Tournaments R6
Route::controller(RainbowSixTournamentController::class)->middleware(['auth', 'rainbowsix_editor'])->prefix('dashboard/rainbowsix')->name('dashboard.rainbowsix.tournaments.')->group(function () {
    Route::get('/tournaments', 'index')->name('index');//todos os jogadores
    Route::get('/tournaments/create', 'create')->name('create');//ir pra tela de criacao -- dashboard
    Route::post('/tournaments', 'store')->name('store');
    //Route::get('/tournaments/{id}', 'show')->name('show');
    Route::get('/tournaments/edit/{id}', 'edit')->name('edit');
    Route::put('/tournaments/update/{id}', 'update')->name('update');
    //Route::delete('/tournaments/{id}', 'destroy')->name('destroy');
});







Route::controller(AdminController::class)->middleware(['auth', 'admin'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/neweditor', 'newEditor')->name('neweditor');
    Route::get('/newadmin', 'newAdmin')->name('newadmin');

    Route::put('/neweditor', 'makeEditor')->name('new.editor');
    Route::put('/newadmin', 'makeAdmin')->name('new.admin');
});




























//Contribute for user
Route::controller(ContributeController::class)->middleware(['auth'])->prefix('/contribute')->name('contribute.')->group(function () {
    Route::get('/{game}/player', 'player')->name('player');
    Route::post('/player', 'storePlayer')->name('player.store');

    Route::get('/{game}/team', 'team')->name('team');
    Route::post('/team', 'storeTeam')->name('team.store');
});

//Contribute for admin
Route::controller(ValidateContributeController::class)->middleware(['auth', 'admin'])->prefix('dashboard/contribute')->name('dashboard.contribute.')->group(function () {
    Route::get('/valorant', 'valorantContributes')->name('valorant');
    Route::get('/valorant/player/{id}', 'showPlayer')->name('valorant.player');
    Route::get('/valorant/team/{id}', 'showTeam')->name('valorant.team');

    Route::get('/csgo', 'csgoContributes')->name('csgo');
    Route::get('/csgo/player/{id}', 'showCsgoPlayer')->name('csgo.player');
    Route::get('/csgo/team/{id}', 'showCsgoTeam')->name('csgo.team');

    Route::get('/rainbowsix', 'rainbowsixContributes')->name('rainbowsix');
    Route::get('/rainbowsix/player/{id}', 'showRainbowsixPlayer')->name('rainbowsix.player');
    Route::get('/rainbowsix/team/{id}', 'showRainbowsixTeam')->name('rainbowsix.team');


    Route::put('/valorant/player/approve/{id}', 'playerApprove')->name('valorant.player.approve');
    Route::delete('/valorant/player/delete/{id}', 'destroyPlayer')->name('valorant.player.destroy');

    Route::put('/valorant/team/approve/{id}', 'teamApprove')->name('valorant.team.approve');
    Route::delete('/valorant/team/delete/{id}', 'destroyTeam')->name('valorant.team.destroy');
});

require __DIR__.'/auth.php';
