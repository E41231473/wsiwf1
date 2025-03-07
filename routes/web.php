<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\backend\PengalamanKerjaController;
use App\Http\Controllers\backend\PendidikanController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//acara13
Route::resource('pengalaman_kerja', PengalamanKerjaController::class);
Route::resource('pendidikan', PendidikanController::class);