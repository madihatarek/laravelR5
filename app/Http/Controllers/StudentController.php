<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;

class studentController extends Controller {
    private $items = [ 'studentName', 'age' ];

    /**
    * Display a listing of the resource.
    */

    public function index() {
        $students = Student::get();
        return view( 'students', compact( 'students' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
        return view( 'addStudent' );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        // $student = new Student();
        // $student->studentName = $request->studentName;
        // $student->age = $request->age;
        // $student->save();
        // return 'inserted Student Successfully';

        // second way to insert...
        // Student::create( $request->only( $this->items ) );
        // return redirect( 'students' );

        // third way to insert using Query Builder..
        // $student = [
        //     'studentName' => $request->input( 'studentName' )
        //, 'age' => $request->input( 'age' )
        // ];
        // DB::table( 'students' )->insert( [
        //     'studentName' => $request->input( 'studentName' )
        //, 'age' => $request->input( 'age' )
        // ] );

        //validation.......................
        $data = $request->validate( [
            'studentName' => 'required|max:100|min:5',
            'age' => 'required|max:3',
        ] );
        // DB::table('students')->insert($data);
        Student::create( $data );
        return redirect( 'students' )->with( 'success', 'Inserted Successfully' );
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        $student = DB::table( 'students' )->where( 'id', $id )->first();
        return view( 'showStudent', compact( 'student' ) );
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        $student = Student::findOrFail( $id );
        return view( 'editStudent', compact( 'student' ) );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        // using Query Builder....
        // $student = [
        //     'studentName' => $request->input( 'studentName' ),
        //     'age' => $request->input( 'age' )
        // ];
        $studentData = $request->validate([
            'studentName' => 'required|max:100|min:5',
            'age' => 'required|max:3',
        ]);
        DB::table( 'students' )->where( 'id', $id )->update( $studentData );
        return redirect( 'students' )->with( 'success', 'Updated Successfully' );
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( Request $request ) {
        $id = $request->id;
        Student::where( 'id', $id )->delete();
        // DB::table( 'students' )->where( 'id', $id )->delete();
        return redirect( 'students' )->with( 'success', 'Deleted Successfully' );
    }

    /**
    *  Move To Trashed
    */

    public function trash() {
        // $trashed = DB::table( 'students' )->onlyTrashed()->get();
        // return view( 'trashStudent', compact( 'trashed' ) );

        $trashed = Student::onlyTrashed()->get();
        return view( 'trashStudent', compact( 'trashed' ) );
    }

    /**
    * Restore data from trashed.
    */

    public function restore( string $id ) {
        Student::where( 'id', $id )->restore();
        return redirect( 'students' )->with( 'success', 'Restored data Successfully' );

    }

    /**
    * Remove the specified resource from storage forever force Delete
    */

    public function forceDelete( Request $request ) {
        $id = $request->id;
        Student::where( 'id', $id )->forceDelete();
        return redirect( 'trashStudent' )->with( 'success', 'Deleted all data Successfully' );

    }
}