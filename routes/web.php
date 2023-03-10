<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpotifyController;
use App\Http\Controllers\DashboardController;


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

Route::get('/', [HomeController::class, 'index'])
    ->name('Home');

Route::get('/Spotify', [SpotifyController::class, 'index']);   

Route::get('/Dashboard', [DashboardController::class, 'index']);

Route::get('/Dashboard/Show', [DashboardController::class, 'show']);
