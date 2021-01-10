<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;

class AccountController extends Controller{
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        return view('accounts-menu.index');
    }

    public function firstLevel(Request $request){
        $error = "";
        $warning = "";
        $api = new ApiController;
        $userCurrency = Currency::find(auth()->user()->default_currency);

        //Redirect property set
        $url    = route('firstLevelOfAuth');
        $method = 'get';
        $option = $request->option;
        $amount = isset($request->amount) && is_numeric($request->amount)? $request->amount : 0;

        if(!isset($userCurrency) && $option>=2 && $option<=4){
            $warning = "First you need establish your default currency";
            $option = 5;
        }

        switch ($option) {
            case 1:
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
            case 2:
                $input   = 'depositCurrency';

                return view('accounts-menu.deposit')
                    ->with('url',     $url)
                    ->with('option',  $option)
                    ->with('method',  $method)
                    ->with('input',   $input)
                    ->with('error',   $error);
            case 3:
                
            case 4:

            case 5:
                $input   = 'defaultCurrency';
                $warning = isset($userCurrency) ? 
                                "You had set ".$userCurrency->acronym." like your default currency if you want to change this"
                                : $warning;
                $warning = isset($request->warning) ? $warning.' '.$request->warning : $warning;
                $defaultCurrency = $api->isValidCurrency($request->defaultCurrency);

                if($defaultCurrency=="invalid"){
                    $defaultCurrency = "";
                    $error = "Invalid code for currency";
                }else{
                    $error = "";
                }

                return view('accounts-menu.default')
                    ->with('url',     $url)
                    ->with('option',  $option)
                    ->with('method',  $method)
                    ->with('input',   $input)
                    ->with('error',   $error)
                    ->with('warning', $warning)
                    ->with('defaultCurrency', $defaultCurrency);
            case 6:
                $loginController = new LoginController;
                return $loginController->logout($request);
            default:
                return redirect()->route("indexOfAuth");
        }
    }

    public function redirectDefaultCurrency(Request $request){
        $option = $request->optionConfirm;

        switch ($option) {
            case '1':
                $user = User::find(auth()->user()->code);
                $userCurrency = Currency::where('acronym','=',$request->defaultCurrency)->get()[0];
                $user->default_currency = $userCurrency->code;
                $user->save();

                return redirect()->route('index');
            case '2':
                return redirect()->route('firstLevelOfAuth',[
                    'option' => '5', 
                    'warning'  => "let's try again"
                ]);
            default:
                return redirect()->route('index');
        }

    }

}