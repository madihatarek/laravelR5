<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller {
    private $colums = [ 'clientName', 'phone',
    'email', 'website' ];

    /**
    * Display a listing of the resource.
    */

    public function index() {
        $clients = Client::get();
        return view( 'clients', compact( 'clients' ) );

    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        return view( 'addClient' );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        // // objects from class...
        // $client = new Client();
        // $client->clientName = $request->clientName;
        // $client->phone =  $request->phone;
        // $client->email =  $request->email;
        // $client->website =  $request->website;

        // $client->save();
        // return 'Inserted Successfully';
        // // return view( 'clients' );

        //second way to insert.... advanced way.
        // Client::create( $request->only( $this->colums ) );
        // return redirect( 'clients' )->with( 'success', 'Inserted Successfully' );

        $message = $this->errMsg();
        $data =  $request->validate( $this->validateData(), $message );

        $imgExt = $request->image->getClientOriginalExtension();
        $fileName = time() . '.' . $imgExt;
        $path = 'assets/images';
        $request->image->move( $path, $fileName );

        $data[ 'image' ] = $fileName;
        $data[ 'active' ] = isset( $request->active );
        Client::create( $data );
        return redirect( 'clients' )->with( 'success', 'Inserted Successfully' );

    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {

        $client = Client::findOrFail( $id );
        return view( 'showClient', compact( 'client' ) );
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        //string $id {
        $client = Client::findOrFail( $id );
        return view( 'editClient', compact( 'client' ) );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {

        // Client::where( 'id', $id )->update( $request->only( $this->colums ) );
        // return redirect( 'clients' )->with( 'success', 'Updated Successfully' );
        $message = $this->errMsg();
        $data = $request->validate( [
            'clientName' => 'required|max:100|min:5',
            'phone' => 'required|min:11',
            'email' => 'required|email:rfc',
            'website' =>'required',
            'city' => 'required|max:30',
            'image' => [ 'nullable', 'image', 'mimes:jpeg,png,jpg', 'min:10', 'max:12288',
            Rule::dimensions()->maxWidth( 1000 )->maxHeight( 500 ) ],
        ], $message );

        $existingImage = Client::find($id);
        $oldImage = $existingImage->image;

        if ( $request->hasFile( 'image' ) ) {
            $imgExt = $request->image->getClientOriginalExtension();
            $fileName = time() . '.' . $imgExt;
            $path = 'assets/images';
            $request->image->move( $path, $fileName );
            $data[ 'image' ] = $fileName;
            // Delete the old image if it exists
            if ( $oldImage ) {
                Storage::delete( $path . '/' . $oldImage );
            }
        } else {
            $data['image'] = $oldImage;
        }
        $data[ 'active' ] = isset( $request->active );
        Client::where( 'id', $id )->update( $data );
        return redirect( 'clients' )->with( 'success', 'Updated Successfully' );
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( Request $request ) {
        $id = $request->id;
        Client::where( 'id', $id )->delete();
        // return redirect( 'clients' );
        return redirect( 'clients' )->with( 'success', 'Move to Trash Successfully' );

    }

    /**
    *    Trash.
    */

    public function trash() {
        $trashed = Client::onlyTrashed()->get();
        return view( 'trashClient', compact( 'trashed' ) );

    }

    /**
    * Restore data from trashed.
    */

    public function restore( string $id ) {
        Client::where( 'id', $id )->restore();
        // return redirect( 'clients' );
        return redirect( 'clients' )->with( 'success', 'Restored data Successfully' );

    }

    /**
    * Remove the specified resource from storage forever force Delete
    */

    public function forceDelete( Request $request ) {
        $id = $request->id;
        Client::where( 'id', $id )->forceDelete();
        // return redirect( 'clients' );
        return redirect( 'trashClient' )->with( 'success', 'Deleted all data Successfully' );

    }

    public function errMsg() {
        return [
            'clientName' => 'The Client Name is missed ,Please enter ',
            'clientName.min' => 'The Client name length less than 5, Please insert more',
            'email' => 'The email is missed ,Please enter ',
            'city' => 'The City is required ,Please select it ',
            'image.required' => 'Please upload an image.',
            'image.image' => 'Invalid image format.',
            'image.min' => 'The image must be at least 1 kilobyte.',
            'image.max' => 'The image cannot exceed 12 kilobytes.',

        ];
    }

    protected function validateData() {
        return [
            'clientName' => 'required|max:100|min:5',
            'phone' => 'required|min:11',
            'email' => 'required|email:rfc',
            'website' =>'required',
            'city' => 'required|max:30',
            'image' => [ 'required', 'image', 'min:10', 'max:12288',
            Rule::dimensions()->maxWidth( 1000 )->maxHeight( 500 ) ],

        ];

    }

}
