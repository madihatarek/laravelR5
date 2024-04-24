<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('madiha/{id}', function($id){
    return "welocme to my website ". $id;
});
//Route ===> class