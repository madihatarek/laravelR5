<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //
    public function my_data() {
        return view('test');
    }

    // receive data from from.......
    // compact ===> send data to this page...
    // النوع request 
    // request ==> لتخزين الداتا اللي عايزة ابعتها لصفحة تانية 
    public function receiveData(Request $request){
        $fname= $request->fname;
        $lname=$request->lname;
        return view('receiveForm',compact('fname','lname'));
    }
}
