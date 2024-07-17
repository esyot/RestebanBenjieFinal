<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Charge;
use App\Models\Student;

class AccountController extends Controller
{
    public function index(){

        $accounts = Account::orderby('id')->get();
        $charges = Charge::orderBy('id')->get();

     
        return view('pages.accounts', compact('charges' ,'accounts'));
    }

    public function getCharges($id)
    {
       
    $account = Account::with('charges')->findOrFail($id);
    return view('partials.charges', compact('account'));
    }

    public function addCharges(Request $request, $id) {
       try{
        $request->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric'
        ]);
    
       $charge =  Charge::create([
            'account_id' => $id,
            'title' => $request->title,
            'amount' => $request->amount
        ]);
        if($charge){
        
       
        $account = Account::with('charges')->findOrFail($id);
        $html = view('partials.charges', compact('account'))->render();

        $success = view('messages.charge-add-success', ['id'=>$id])->render(); 

        return $html . $success;

        }}catch (\Exception $e) {
            $errorMessages = [
                'title' => '',
                'amount' => '',
                
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
    
                $accounts = Account::orderby('id')->get();

                $account = Account::findOrFail($id)->get();

               
                $html = view('inclusions.accounts-list', compact('accounts'))->render();

    
                return $errorMessageHTML . $errorMessage . $html;
    
            }
        }
    
}

    public function create(){

        $students = Student::orderby('first_name')->get();

        return view('modals.account-create', compact('students'));

    }

    public function store(Request $request){

        $request->validate([
            'student_id' => 'required|numeric',
            'section' => 'required|string',
            'remarks' => 'required|string'
        ]);

        $existingAccount = Account::where('student_id', $request->student_id)
                              ->where('remarks', $request->remarks)
                              ->first();

                              

    if ($existingAccount) {
        $accounts = Account::orderby('id')->get();
        $charges = Charge::orderBy('id')->get();
         
       
        $html = view('inclusions.accounts-list', compact('charges' ,'accounts'))->render();

        $error = view('errors.account-create-error')->render();
        
        return $html . $error;
    }
    
  
        Account::create([
            'student_id' => $request->student_id,
            'section' => $request->section,
            'remarks' => $request->remarks,
        ]);
    
        $accounts = Account::orderby('id')->get();
        $charges = Charge::orderBy('id')->get();
         
        $success = view('messages.account-create-success')->render();
        $html = view('inclusions.accounts-list', compact('charges' ,'accounts'))->render();
     
        return $success . $html;
                
    }

    public function deleteCharge($id){

        $charge = Charge::findOrFail($id);

        $charge->delete();
        
        $success = view('messages.charge-delete-success', compact('charge'))->render();
        return $success;
    }

    public function updatecharge($id){

        dd('id fetched!');
    }


}
