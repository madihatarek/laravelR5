<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

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
Route::get('formLogin',function(){
    return view('formLogin');
});


// receive data from method post....
Route::post('receiveForm',function(){
    return view('receiveForm');
})->name('receiveForm');

////////////////////////////////////////
Route::get('test11',[MyController::class,'my_data']);