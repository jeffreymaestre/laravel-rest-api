<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function store(Request $request){

        //Event::create(...);
        
        if ($request->input('type') === 'deposit') {
            return $this->deposit( 
                $request->input('destination'),
                $request->input('amount')
            );
        }
    }

    private function deposit($destination, $amount){
        $account = Account::firstOrCreate([
            'id' => $destination
        ]);

        $account->balance += $amount;
        $account->save(); //TODO: Actualizando el balance de la cuenta

        return response()->json([
                'destination' => [
                'id' => $account->id,
                'balance' => $account->balance
            ]
        ], 201);
    }
}
