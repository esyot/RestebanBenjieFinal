<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){

        $students = Student::orderBy('id')->get();

        return view('pages.students', compact('students'));
    }

    public function delete($id){

        $student = Student::find($id);

        $student->delete();

        return redirect()->route('students.view')->with('success', 'Student has been deleted successfully');
    }

    public function create(Request $request){

        $request->validate([
            'first_name'=> 'required|string',
            'last_name' => 'required|string',
            'middle_name' => 'required|string',
            'dob' => 'required|date',
            'address' => 'required|string'
        ]);

        Student::create([

            'first_name' =>$request->first_name,
            'last_name' =>$request->last_name,
            'middle_name' =>$request->middle_name,
            'dob' =>$request->dob,
            'address' => $request->address
        ]);

        $students = Student::orderBy('id')->get();

        $html = view('inclusions.students-list', compact('students'))->render();
        
        return $html;
    }

    public function update(Request $request, $id){

        $request->validate([
            'first_name'=> 'required|string',
            'last_name' => 'required|string',
            'middle_name' => 'required|string',
            'dob' => 'required|date',
            'address' => 'required|string'
        ]);

        $student = Student::findOrFail($id);

        $student->update([
            'first_name' =>$request->first_name,
            'last_name' =>$request->last_name,
            'middle_name' =>$request->middle_name,
            'dob' =>$request->dob,
            'address' => $request->address
        ]);

        return redirect()->back()->with('success', 'Student has been successfully updated!');
       

    }
}
