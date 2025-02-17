<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/foo', function () {
    return "Hello World";
});

Route::get('user/{id}',function($id){
    return 'User '.$id;
});