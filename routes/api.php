<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// Route::get('/user', function () {
//     return 'Hello World';
// });
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

 Route::get('/user', function () {
        return 'Hello World';
    });

Route::get('/contact',function(){
    return view('contactUs');
})->name('contact');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
