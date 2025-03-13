<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\backend\PengalamanKerjaController;
use App\Http\Controllers\backend\PendidikanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', [HomeController::class, 'index']);

// Route::group(['namespace' => 'App\Http\Controllers\backend'], function()
// {
//     Route::resource('dashboard', 'DashboardController');
// });
Route::group(['namespace' => 'App\Http\Controllers\frontend'], function () {
    Route::resource('home', 'HomeController');
});

Route::get('/dashboard', [DashboardController::class, 'index'] );
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//acara13-14
Route::resource('pengalaman_kerja', PengalamanKerjaController::class);
//acara115-16
Route::resource('pendidikan', PendidikanController::class);
//acara17
Route::get('/session/create', [SessionController::class, 'create']);
Route::get('/session/show', [SessionController::class, 'show']);
Route::get('/session/delete', [SessionController::class, 'delete']);

Route::get('/pegawai/{nama}', [SessionController::class, 'pegawai']);
Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses']);

//acara 18
Route::get('/cobaeror/{nama}', [CobaController::class, 'index']);
//acara 19
Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'proses_upload'])
->name('upload.proses');

//acara20
Route::get('/dropzone', [UploadController::class, 'dropzone'])->name('dropzone');
Route::post('/dropzone/store', [UploadController::class, 'dropzone_store']);

Route::get('/pdf_upload', [UploadController::class, 'pdf_upload'])->name('pdf.upload');
Route::get('/pdf/store', [UploadController::class, 'pdf_store'])->name('pdf.store');