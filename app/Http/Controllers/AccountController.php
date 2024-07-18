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
        $students = Student::orderby('id')->get();
        $charges = Charge::orderBy('id')->get();

     
        return view('pages.accounts', compact('charges' ,'accounts', 'students'));
    }

    public function getCharges($id)
    {
       
      $charges = Charge::where('account_id', $id)->get();

      $totalAmount = Charge::where('account_id', $id)->sum('amount');

      $account = Account::findOrFail($id);

      return view('partials.charges', compact('charges', 'account', 'totalAmount'));

    }


    public function create(){

        $students = Student::orderby('first_name')->get();

        return view('modals.account-create', compact('students'));

    }

    public function store(Request $request){

        $request->validate([
            'student' => 'required|numeric',
            'section' => 'required|string',
            'remarks' => 'required|string'
        ]);

        $existingAccount = Account::where('student_id', $request->student)
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
            'student_id' => $request->student,
            'section' => $request->section,
            'remarks' => $request->remarks,
        ]);
    
        $accounts = Account::orderby('id')->get();
        $charges = Charge::orderBy('id')->get();
         
        $success = view('messages.account-create-success')->render();

        $html = view('inclusions.accounts-list', compact('charges' ,'accounts'))->render();
     
        return $success . $html;
                
    }

    public function deleteCharge($id, $accountId){

        $charge = Charge::findOrFail($id);

        $charge->delete();

        $html = '';
        
        
        $totalAmount = Charge::where('account_id', $accountId)->sum('amount');

        $success = view('messages.charge-delete-success', compact('charge'))->render();

        $html .= '
            <div id="totalAmount" class="text-xl text-red-500 ml-1" hx-swap-oob="true">₱'.$totalAmount.'</div>
        ';
       
        return $success . $html;
    }



}
