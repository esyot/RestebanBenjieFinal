<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){

        $students = Student::orderBy('created_at', 'DESC')->get();

        return view('pages.students', compact('students'));
    }

    public function delete($id){

        $student = Student::findOrFail($id);

        $student->delete();

        $success = view('messages.student-delete-success', ['id'=>$id])->render();

        return $success;
        
    }

    public function create(Request $request){
        try{
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

        $students = Student::orderBy('created_at', 'DESC')->get();

        $html = view('inclusions.students-list', compact('students'))->render();
        
        $errorMessages = [
            'first_name' => '<div id="first_name-error" hx-swap-oob="true"></div>',
            'last_name' => '<div id="last_name-error" hx-swap-oob="true"></div>',
            'middle_name' => '<div id="middle_name-error" hx-swap-oob="true"></div>',
            'dob' => '<div id="dob-error" hx-swap-oob="true"></div>',
            'address' => '<div id="address-error" hx-swap-oob="true"></div>',
        ];

        $errorMessageHTML = '';
        foreach ($errorMessages as $errorMessage) {
            $errorMessageHTML .= $errorMessage;
        }

        $successMessage = '';

        $successMessage .='<div id="message" hx-swap-oob="true" class="py-2 px-2 text-center bg-green-200 text-green-500 rounded m-2">Student successfully added!</div>';

       
        $success = view('messages.student-create-success')->render();

        return $html . $errorMessageHTML . $successMessage . $success;

        
    } catch (\Exception $e) {
        $errorMessages = [
            'first_name' => '',
            'last_name' => '',
            'middle_name' => '',
            'dob' => '',
            'address' => '',
        ];

        if ($e instanceof \Illuminate\Validation\ValidationException) {
            $errors = $e->validator->errors();

            foreach ($errorMessages as $field => $message) {
                if ($errors->has($field)) {
                    $errorMessages[$field] = '<div id="' . $field . '-error" hx-swap-oob="true" class="italic text-left text-red-500 text-sm">' . $errors->first($field) . '</div>';
                } else {
                    $errorMessages[$field] = '<div id="' . $field . '-error" hx-swap-oob="true" class="italic text-left text-red-500 text-sm"></div>';
                }
            }

            $errorMessageHTML = '';

            foreach ($errorMessages as $errorMessage) {
                $errorMessageHTML .= $errorMessage;
            }

            $errorMessage = '';

            $errorMessage .= '<div id="message" hx-swap-oob="true" class="py-2 px-2 text-center bg-red-200 text-red-500 rounded m-2">Student Error!</div>';

            $students = Student::orderBy('created_at', 'DESC')->get();

            $html = view('inclusions.students-list', compact('students'))->render();

            return $html . $errorMessageHTML . $errorMessage;

        }

     }

    }


    public function update(Request $request, $id){

       
        try{

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

        $students = Student::orderBy('created_at', 'DESC')->get();

        $html = view('inclusions.students-list', compact('students'))->render();
        $success = view('messages.student-update-success')->render();
        
        if($student){
       
        return $html . $success;
        
        }
     } catch (\Exception $e) {
        $errorMessages = [
            'first_name' => '',
            'last_name' => '',
            'middle_name' => '',
            'dob' => '',
            'address' => '',
        ];

        if ($e instanceof \Illuminate\Validation\ValidationException) {
            $errors = $e->validator->errors();

            foreach ($errorMessages as $field => $message) {
                if ($errors->has($field)) {
                    $errorMessages[$field] = '<div id="' . $field . '-error" hx-swap-oob="true" class="italic text-left text-red-500 text-sm">' . $errors->first($field) . '</div>';
                } else {
                    $errorMessages[$field] = '<div id="' . $field . '-error" hx-swap-oob="true" class="italic text-left text-red-500 text-sm"></div>';
                }
            }

            $errorMessageHTML = '';

            foreach ($errorMessages as $errorMessage) {
                $errorMessageHTML .= $errorMessage;
            }

            $errorMessage = '';

            $errorMessage .= '<div id="message" hx-swap-oob="true" class="py-2 px-2 text-center bg-red-200 text-red-500 rounded m-2">Student Error!</div>';

            $students = Student::orderBy('created_at', 'DESC')->get();

            $html = view('inclusions.students-list', compact('students'))->render();

            return $html . $errorMessageHTML . $errorMessage;

        }

      }
    
    }

    public function student($id){

        $student = Student::findOrFail($id);

        return view('modals.student-edit', compact('student'));

    }
}
