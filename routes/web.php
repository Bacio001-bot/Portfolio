<?php

use App\Http\Controllers\LoginController;
use App\Http\Livewire\Pages\AgendaController;
use App\Http\Livewire\Pages\CheckController;
use App\Http\Livewire\Pages\ClientsController;
use App\Http\Livewire\Pages\TreatmentsController;
use App\Http\Livewire\Pages\ExportController;
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

Route::get('loginCheck', [LoginController::class, 'login'])->name('loginCheck');
Route::get('login', function() { return view('auth.login'); })->name('login');

Route::get('logout', function() { 
    session()->put('authenticated', false);
    return view('auth.login'); 
})->name('logout');

Route::group(['middleware' => 'access'], function() {

    Route::get('/', AgendaController::class)->name('agenda');
    Route::get('/agenda', AgendaController::class)->name('agenda');
    Route::get('/treatments', TreatmentsController::class)->name('treatments');
    Route::get('/clients', ClientsController::class)->name('clients');
    Route::get('/check', CheckController::class)->name('check');
    Route::get('/export', ExportController::class)->name('export');

});
