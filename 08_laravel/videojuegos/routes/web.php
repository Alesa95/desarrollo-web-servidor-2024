<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\VideogameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('/videojuegos', [VideogameController::class, 'index']);
Route::resource('/videojuegos', VideogameController::class);

Route::get('/consolas', [ConsoleController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

