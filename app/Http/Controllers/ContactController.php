<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $messages = [
            'name.required' => 'We need to know your name!',
            'email.required' => 'Don`t forget your email address!',
            'email.email' => 'Please provide a valid email address.',
            'message.required' => 'A message is required to submit the form.',
        ];

        $validatedData = $request->validate([
            'clientName' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required|min:11',
            'subject' => 'required|min:3|max:100',
            'message' => 'required|min:10',
        ], $messages);

        Mail::to('My_Company@gmail.com')->send(new ContactMail($validatedData));

        return 'success '.' Thank you for your message!';
        // return back()->with('success', 'Thank you for your message!');
    }
}
