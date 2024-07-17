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
}
