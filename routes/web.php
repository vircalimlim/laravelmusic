<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PlaylistSongController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/song/create', [SongController::class, 'create']);
Route::post('/song', [SongController::class, 'store']);
Route::get('/song', [SongController::class, 'index']);

Route::get('/playlist/create', [PlaylistController::class, 'create']);
Route::post('/playlist', [PlaylistController::class, 'store']);
Route::get('/playlist', [PlaylistController::class, 'index']);

Route::get('/playlistsong/create', [PlaylistSongController::class, 'create']);
Route::post('/playlistsong', [PlaylistSongController::class, 'store']);
Route::get('/playlistsong', [PlaylistSongController::class, 'index']);


