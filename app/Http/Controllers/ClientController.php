<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    private $colums = ['clientName','phone',
     'email', 'website'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::get();
        return view('clients' , compact('clients')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addClient');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // // objects from class...
        // $client = new Client();
        // $client->clientName = $request->clientName;
        // $client->phone =  $request->phone;
        // $client->email =  $request->email;
        // $client->website =  $request->website; 
        // $client->save();
        // return "Inserted Successfully";
        // // return view('clients');
        
        //second way to insert.... advanced way.
        Client::create($request->only($this->colums));
        return redirect('clients');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
