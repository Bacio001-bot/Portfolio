<?php

use App\Http\Livewire\Pages\Home;
use App\Http\Livewire\Pages\Favorites;
use App\Http\Livewire\Pages\Liked;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', Home::class)->name('home');
Route::get('/favorites', Favorites::class)->name('favorites');
Route::get('/liked', Liked::class)->name('liked');
