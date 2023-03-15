<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('client', [ClientController::class, 'index'])->name('client');
Route::get('client/create', [ClientController::class, 'create'])->name('client.create');
Route::post('client/store', [ClientController::class, 'store'])->name('client.store');
