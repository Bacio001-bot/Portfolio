<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function() {
    return view('auth.login');
});

Route::get('/logout', function() {
    Auth::logout();
    return view('auth.login');
})->name('logout');

Route::get('/githublogin', [LoginController::class, 'githubRedirect'])->name('githublogin');
Route::get('/githubinfo', [LoginController::class, 'githubCallback']);
Route::get('/googlelogin', [LoginController::class, 'googleRedirect'])->name('googlelogin');
Route::get('/googleinfo', [LoginController::class, 'googleCallback']);
Route::get('/discordlogin', [LoginController::class, 'discordRedirect'])->name('discordlogin');
Route::get('/discordinfo', [LoginController::class, 'discordCallback']);

Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/company', CompanyController::class);
    Route::resource('/employee', EmployeeController::class);

});
