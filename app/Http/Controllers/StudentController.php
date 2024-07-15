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
}
