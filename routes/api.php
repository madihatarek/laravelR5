<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function () {
//     return 'Hello World';
// });
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

 Route::get('/user', function () {
        return 'Hello World';
    });

Route::get('test',function(){
    return view('test');
});