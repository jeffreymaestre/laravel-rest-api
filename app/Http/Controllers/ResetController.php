<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ResetController extends Controller
{
    public function reset(){
        Artisan::call('migrate:fresh');
        
        return 'OK'; //TODO: status code is 200
    }
}
