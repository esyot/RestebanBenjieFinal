<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charge;

class ChargesController extends Controller
{
    public function index(){
        
        $charges = Charge::where('account_id', 2)->get();

        return view('pages.charges', compact('charges'));
    }

    public function charges($id){
        
        $charges = Charge::where('account_id', $id)->get();

        return view('modals.account-charges', compact('charges'));
    }
}
