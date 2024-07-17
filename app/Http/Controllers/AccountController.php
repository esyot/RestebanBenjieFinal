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

        $request->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric'
        ]);
    
        Charge::create([
            'account_id' => $id,
            'title' => $request->title,
            'amount' => $request->amount
        ]);
    
        $accounts = Account::orderby('id')->get();
     
        return view('inclusions.accounts-list', compact('accounts'));
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
}
