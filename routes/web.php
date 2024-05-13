<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StudentController;

Route::post('insertStudent',[StudentController::class,'store'])->name("insertStudent");
Route::get('addStudent',[StudentController::class,'create'])->name('addStudent');
Route::get('students',[StudentController::class,'index'])->name("students");
Route::get('editStudent/{id}',[StudentController::class,'edit'])->name("editStudent"); //show edit form page...
Route::put('updateStudent/{id}', [StudentController::class,'update'])->name('updateStudent');
Route::get('showStudent/{id}',[StudentController::class,'show'])->name("showStudent"); 
Route::delete('deleteStudent',[StudentController::class,'destroy'])->name("deleteStudent");



Route::post('insertClient',[ClientController::class,'store'])->name("insertClient"); // insert the variables in database...
Route::get('addClient',[ClientController::class,'create'])->name("addClient"); //show add form page...
Route::get('clients',[ClientController::class,'index'])->name("clients");
Route::get('editClient/{id}',[ClientController::class,'edit'])->name("editClient"); //show edit form page...
Route::put('updateClient/{id}', [ClientController::class,'update'])->name('updateClient');
Route::get('showClient/{id}',[ClientController::class,'show'])->name("showClient"); 
Route::delete('deleteClient',[ClientController::class,'destroy'])->name("deleteClient"); 











Route::get('/', function () {
    return view('welcome');
});

// madiha/id ====> is URL.....
// Route::get('madiha/{id?}', function($id = 0){
//     return "welocme to my website ". $id;
// });
//Route ===> class
// variablesName in laravel is camal case....


//limited (from...to...)
// Route::get('madiha/{id?}', function($id = 0){
//     return "welocme to my website ". $id;
// })->where(['id' => '[0-3]+']);


// whereNumber ===> enters numbers only....
Route::get('madiha/{id?}', function($id = 0){
    return "welocme to my website ". $id;
})->whereNumber('id');



// whereAlpha ===> enters string only....
// Route::get('course/{name}', function($name){
//     return "My name is:  ". $name;
// })->whereAlpha('name');

// whereIn ===> check between two strings or more....
Route::get('course/{name}', function($name){
    return "My name is:  ". $name;
})->whereIn('name',['Madiha' , 'Marwa' , 'omniA']);


Route::prefix('cars')->group(function(){
    Route::get('bmw',function(){
        return 'Category is BMW';
    });

    Route::get('mercedes',function(){
        return 'Category is Mercedes';
    });

    Route::get('mercedes',function(){
        return 'Category is Mercedes';
    });
    
});



//fallback ===> if entered anything wrong....
// Route::fallback(function(){
//     // return 'Page is not found';
//     return redirect('/');
// });




// to get pages(html pages) from folder views.....
Route::get('test',function(){
    return view('test');
});
// shortcode ===> of view...
// Route::view('test11', 'test');


//form to get data
// first formLogin ===> URL name
// second formLogin ====> view form.
Route::get('formLogin',function(){
    return view('formLogin');
});




////////////////////////////////////////
// Route::get('test1',[MyController::class,'my_data']);

///////////////////////////////////////////////////////////////

// first receiveData ===> URL name
// second receiveData ====> function name in  MyController class to use this func.
// receiveForm ===> send data to this page...
Route::post('receiveData',[MyController::class,'receiveData'])->name('receiveForm');