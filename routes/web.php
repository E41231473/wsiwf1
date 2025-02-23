<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/foo', function () {
    return "Hello World";
});

Route::get('user/{id}',function($id){
    return 'User '.$id;
});

Route::get('/user/{name?}', function ($name = 'Guest') {
    return 'Hello, ' . $name;
});

// Route::get('/home', function () {
//     return view('home', [
//         'home' => 'Willy',
//         'pelajaran' => ['Matematika', 'Fisika', 'Kimia', 'Biologi']
//     ]);
// });

Route::get('/home', [HomeController::class, 'index']);
Route::resource('/home', HomeController::class);
