<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Account;

class PaymentController extends Controller
{
    public function create(Request $request, $id){
        try{
        $request->validate([
            'payment_amount' => 'required|numeric'
        ]);

        $payment = Payment::create([

            'account_id' => $id,
            'date'=> now(),
            'amount_paid' => $request->payment_amount,
           
        ]);

        if($payment){

            $account = Account::findOrFail($id);
            return view('messages.payment-add-success', compact('account'));
    
        }
               
    
    
        } catch (\Exception $e) {

            $account = Account::findOrFail($id);

            $error = view('errors.payment-add-error', compact('account'))->render();

            return $error;

            }
        }
    }
