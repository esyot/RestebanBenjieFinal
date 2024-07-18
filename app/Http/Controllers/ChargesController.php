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
        try {
          
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

                return view('messages.charge-add-success', compact('account'));

            }
         

        } catch (ValidationException $e) {
            
            $errors = $e->validator->errors();
            $errorMessages = [
                'title' => '',
                'amount' => '',
            ];

            foreach ($errorMessages as $field => $message) {
                if ($errors->has($field)) {
                    $errorMessages[$field] = '<div id="' . $field . '-error" hx-swap-oob="true" class="italic text-left text-red-500 text-sm">' . $errors->first($field) . '</div>';
                } else {
                    $errorMessages[$field] = '<div id="' . $field . '-error" hx-swap-oob="true" class="italic text-left text-red-500 text-sm"></div>';
                }
            }

            $errorMessageHTML = implode('', $errorMessages);
            $errorMessage = '<div id="message" hx-swap-oob="true" class="py-2 px-2 text-center bg-red-200 text-red-500 rounded m-2">Fields Error!</div>';

            
            $charges = Charge::where('account_id', $id)->get();
            $totalAmount = Charge::where('account_id', $id)->sum('amount');
            $account = Account::findOrFail($id);

            $html = view('partials.charges', compact('charges', 'account', 'totalAmount'))->render();

            return $html . $errorMessageHTML . $errorMessage;
        } catch (\Exception $e) {
      
            $errorMessage = '<div id="message" hx-swap-oob="true" class="py-2 px-2 text-center bg-red-200 text-red-500 rounded m-2">An unexpected error occurred!</div>';

           
            $charges = Charge::where('account_id', $id)->get();
            $totalAmount = Charge::where('account_id', $id)->sum('amount');
            $account = Account::findOrFail($id);

            $html = view('partials.charges', compact('charges', 'account', 'totalAmount'))->render();

            return $html . $errorMessage;
        }
    }

    public function chargeModal($id){

        $account = Account::findOrFail($id);

        return view('modals.charge-add', compact('account'));
    }
}
