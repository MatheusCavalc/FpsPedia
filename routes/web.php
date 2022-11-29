<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\Valorant\PlayerController;


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
Route::get('/', [MainController::class, 'index']);
Route::controller(MainController::class)->name('index.')->group(function () {
    Route::get('/valorant/Home', 'valorant')->name('valorant');
    Route::get('/csgo/Home', 'valorant')->name('csgo');
    Route::get('/rainbowsix/Home', 'valorant')->name('rainbowsix');
    Route::get('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
});




















//Dashboard - Paginas de Editores e Administradores
//Players Valorant
Route::controller(PlayerController::class)->prefix('dashboard/valorant')->name('dashboard.valorant.')->group(function () {
    Route::get('/players', 'index')->name('players.index');//todos os jogadores

    Route::get('/players/create', 'create')->name('players.create');//ir pra tela de criacao -- dashboard
    Route::post('/players', 'store')->name('players.store');

    //Route::get('/players/{id}', 'show')->name('players.show');

    Route::get('/players/edit/{id}', 'edit')->name('players.edit');
    Route::put('/players/update/{id}', 'update')->name('players.update');

    Route::delete('/players/{id}', 'destroy')->name('players.destroy');
});


require __DIR__.'/auth.php';
