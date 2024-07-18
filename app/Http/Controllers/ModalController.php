<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Account;

class ModalController extends Controller
{
    public function accountEditModal($id){

        $account = Account::findOrFail($id)->get();

        return view('modals.account-edit', compact('account'));

    }
}
