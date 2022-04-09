<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    //

    public function show(Request $request){
         $accountId = $request->id; 
        /*TODO: otra forma de obtener un registro por id consumiendo la api
        $accountId = $request->input('account_id'); */

        $accountId = Account::findOrFail($accountId);

        return $accountId->balance;
    }
}
