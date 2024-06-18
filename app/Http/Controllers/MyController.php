<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Client;
use App\Mail\ContactClient;
// use Illuminate\;

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

    public function myVal(){
        session()->put('test','my first session');
        return 'Session Created';
    }

    public function restoreVal(){
        return 'My Session value is: '. session('test');
    }

    public function deleteVal(){
        // session()->forget('test'); // remove one session
        session()->flush();  // remove all sessions
        return 'Session Removed';
    }

    public function sendClientMail(){
        $data = Client::findOrFail(1)->toArray();
        $data['theMessage'] = 'My Messag in Email..';
        Mail::to($data['email'])->send( 
            new ContactClient($data)
        );
        return "mail sent!";
    }
}
