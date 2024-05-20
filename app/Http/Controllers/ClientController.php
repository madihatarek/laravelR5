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
        // Client::create($request->only($this->colums));
        // return redirect('clients')->with('success','Inserted Successfully');

        $data = $request->validate([
            'clientName' => 'required|max:100|min:5',
            'phone' => 'required|min:11',
            'email' => 'required|email:rfc',
            'website' =>'required',
        ]);

         Client::create($data);
        return redirect('clients')->with('success','Inserted Successfully');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $client = Client::findOrFail($id);
        return view('showClient', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)  //string $id
    {
        $client = Client::findOrFail($id);
        return view('editClient', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Client::where('id', $id)->update($request->only($this->colums));
        // return redirect('clients')->with('success','Updated Successfully');

        $data = $request->validate([
            'clientName' => 'required|max:100|min:5',
            'phone' => 'required|min:11',
            'email' => 'required|email:rfc',
            'website' =>'required',
        ]);
        Client::where('id', $id)->update($data);
        return redirect('clients')->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Client::where('id',$id)->delete();
        // return redirect('clients');
        return redirect('clients')->with('success','Move to Trash Successfully');

    }


    /**
     *    Trash.
     */
    public function trash()
    {
        $trashed = Client::onlyTrashed()->get();
        return view('trashClient' , compact('trashed'));

    }
    
    
    /**
     * Restore data from trashed.
     */
    public function restore(string $id)
    {
        Client::where('id',$id)->restore();
        // return redirect('clients');
        return redirect('clients')->with('success','Restored data Successfully');

    }


       /**
     * Remove the specified resource from storage forever force Delete
     */
    public function forceDelete(Request $request)
    {
        $id = $request->id;
        Client::where('id',$id)->forceDelete();
        // return redirect('clients');
        return redirect('trashClient')->with('success','Deleted all data Successfully');

    }



}
