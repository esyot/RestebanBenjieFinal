<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charge;
use App\Models\Student;
use App\Models\Account;
use Illuminate\Validation\ValidationException;

class ChargesController extends Controller
{
    public function addCharges(Request $request, $id)
    {

            try{

            $request->validate([
                'title' => 'required|string',
                'amount' => 'required|numeric',
            ]);


            $charge = Charge::create([
                'account_id' => $id,
                'title' => $request->title,
                'amount' => $request->amount,
            ]);

            if($charge){

            $account = Account::findOrFail($id);

            $success = view('messages.charge-add-success', compact('account'))->render();

            return $success;



            }
        }catch (\Exception $e) {

            $account = Account::findOrFail($id);

            $html = view('modals.charge-add', compact('account'))->render();

            $error = view('errors.charge-add-error')->render();

            return $html . $error;

        }



    }

    public function chargeModal($id){

        $account = Account::findOrFail($id);

        return view('modals.charge-add', compact('account'));
    }


    public function chargeEditModal($id){

        $charge = Charge::findOrFail($id);

        return view('modals.charge-edit', compact('charge'));
    }

    public function chargeUpdate(Request $request, $id){

        $request->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric'
        ]);

        $charge = Charge::findOrFail($id);

        $charge->update([

            'title' => $request->title,
            'amount' => $request->amount

        ]);

        if($charge){

            $account = Account::findOrFail($charge->account_id);

            $success = view('messages.charge-update-success', compact('account'))->render();

            return $success;
        }
    }
}
