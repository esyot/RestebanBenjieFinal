<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Charge;
use App\Models\Student;
use App\Models\Payment;

class AccountController extends Controller
{
    public function index(Request $request) {
        try {
            if ($request->has('filter')) {
                if (!empty($request->filter)) {
                  
                    $accounts = Account::with('student')->whereHas('student', function ($query) use ($request) {
                        $query->where('first_name', 'like', "%{$request->filter}%")
                              ->orWhere('last_name', 'like', "%{$request->filter}%")
                              ->orWhere('middle_name', 'like', "%{$request->filter}%");
                    })->orWhere('remarks', 'like', "%{$request->filter}%")->orderBy('id')->get();
    
                    return view('inclusions.accounts-list', compact('accounts'));
                } else {
                   
                    $accounts = Account::with('student')->orderBy('id')->get();
                    return view('inclusions.accounts-list', compact('accounts'));
                }
            } else {
               
                $accounts = Account::with('student')->orderBy('id')->get();
            }
        } catch (\Exception $e) {
           
            \Log::error('Error fetching accounts: ' . $e->getMessage());
    
           
            $accounts = collect();
        }
    
        
        $students = Student::orderBy('id')->get();
        $charges = Charge::orderBy('id')->get();
    
        return view('pages.accounts', compact('charges', 'accounts', 'students'));
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

    public function delete($id){

        $account = Account::findOrFail($id);

        $account->delete();

        if($account){

            return view('messages.account-delete-success', compact('account'));
        }


    }

    public function pay($id, $remarks)
    {
        $account = Account::with('charges')->where([
            ['id', '=', $id],
            ['remarks', '=', $remarks]
        ])->firstOrFail();
    
   
        $charges = $account->charges;
        $payments = Payment::where('account_id', $id)->get();
    
 
        $totalAmount = $charges->sum('amount');

        $totalPaid = $payments->sum('amount_paid');
    
   
        $remainingBalance = $totalAmount - $totalPaid;
    
        return view('modals.account-pay', compact('account', 'charges', 'payments', 'totalAmount', 'remainingBalance'));
    }
    





}
