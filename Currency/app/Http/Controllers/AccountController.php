<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Models\Currency;

class AccountController extends Controller{
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        return view('accounts-fl.index');
    }

    public function firstLevel(Request $request){
        //Redirect property set
        $url    = route('firstLevelOfAuth');
        $method = 'get';
        $option = $request->option;
        $amount = isset($request->amount) && is_numeric($request->amount)? $request->amount : 0;

        switch ($option) {
            case 1:
                $error = "";
                $api = new ApiController;
                $currentCurrency = $api->isValidCurrency($request->currentCurrency);
                $newCurrency     = $api->isValidCurrency($request->newCurrency);

                if($currentCurrency=="invalid"){
                    $currentCurrency = "";
                    $newCurrency = "";
                    $error = "Invalid code for currency";
                }else if($newCurrency=="invalid"){
                    $newCurrency = "";
                    $error = "Invalid code for currency";
                }else{
                    $error = "";
                }

                $input = $currentCurrency == '' ? 'currentCurrency' : 'newCurrency';
                $exchange = $api->exchangeMoney($amount, $currentCurrency, $newCurrency);

                return view('first-level.exchange')
                    ->with('url',      $url)
                    ->with('amount',   $amount)
                    ->with('option',   $option)
                    ->with('method',   $method)
                    ->with('input',    $input)
                    ->with('error',    $error)
                    ->with('exchange', $exchange)
                    ->with('currentCurrency', $currentCurrency)
                    ->with('newCurrency',     $newCurrency);
            case 6:
                $loginController = new LoginController;
                return $loginController->logout($request);
            default:
                return redirect()->route("indexOfAuth");
        }
    }

}