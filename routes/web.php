<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', [HomeController::class, 'index']);

// Route::group(['namespace' => 'App\Http\Controllers\backend'], function()
// {
//     Route::resource('dashboard', 'DashboardController');
// });

Route::get('/dashboard', [DashboardController::class, 'index'] );
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
