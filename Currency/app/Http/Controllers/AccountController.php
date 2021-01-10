<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Currency;
use App\Models\Transaction;
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
                $depositCurrency = strtoupper($request->depositCurrency) == 'DEF' ? $userCurrency->acronym : $request->depositCurrency;
                $depositCurrency = $api->isValidCurrency($depositCurrency);
                $warning = isset($request->warning) ? $request->warning : $warning;

                if($depositCurrency=="invalid"){
                    $depositCurrency = "";
                    $error = "Invalid code for currency";
                }else{
                    $error = "";
                }

                return view('accounts-menu.deposit')
                    ->with('url',     $url)
                    ->with('option',  $option)
                    ->with('method',  $method)
                    ->with('input',   $input)
                    ->with('amount',  $amount)
                    ->with('error',   $error)
                    ->with('warning', $warning)
                    ->with('depositCurrency', $depositCurrency);
            case 3:
                $input   = 'withdrawCurrency';
                $warning = isset($request->warning) ? $request->warning : $warning;                
                $withdrawCurrency = strtoupper($request->withdrawCurrency) == 'DEF' ? $userCurrency->acronym : $request->withdrawCurrency;
                $withdrawCurrency = $api->isValidCurrency($withdrawCurrency);    

                if($withdrawCurrency=="invalid"){
                    $withdrawCurrency = "";
                    $error = "Invalid code for currency";
                }else{
                    $error = "";
                }

                $max = $withdrawCurrency == $userCurrency->acronym
                        ? auth()->user()->balance
                        : $api->convertCurrency(auth()->user()->balance, $userCurrency->acronym, strtoupper($request->withdrawCurrency));

                $limit = "Remember that the maximum amount can withdraw is ".$max." in ".$withdrawCurrency;

                return view('accounts-menu.withdraw')
                    ->with('url',     $url)
                    ->with('option',  $option)
                    ->with('method',  $method)
                    ->with('input',   $input)
                    ->with('amount',  $amount)
                    ->with('error',   $error)
                    ->with('warning', $warning)
                    ->with('limit',   $limit)
                    ->with('max',     $max)
                    ->with('withdrawCurrency', $withdrawCurrency);
            case 4:
                $transaction = new Transaction;
                $transaction->setLog(auth()->user()->code,3,"The user has requested his balance");

                return view('accounts-menu.balance')
                    ->with('balance',  auth()->user()->balance)
                    ->with('currency', $userCurrency->acronym);
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
                $api = new ApiController;
                $user = User::find(auth()->user()->code);
                $userCurrency = Currency::find(auth()->user()->default_currency);
                $newCurrency = Currency::where('acronym','=',$request->defaultCurrency)->get()[0];

                $user->balance = $api->convertCurrency($user->balance, $userCurrency->acronym, $newCurrency->acronym);
                $user->default_currency = $newCurrency->code;
                $user->save();

                $transaction = new Transaction;
                $transaction->setLog($user->code,4,"The user has changed his default currency");

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

    public function redirectDeposit(Request $request){
        $option = $request->optionConfirm;

        switch ($option) {
            case '1':
                $api = new ApiController;
                $user = User::find(auth()->user()->code);
                $userCurrency = Currency::find($user->default_currency);
                $deposit = $api->convertCurrency($request->amount, strtoupper($request->depositCurrency), $userCurrency->acronym);

                $user->balance = $user->balance+$deposit; 
                $user->save();

                $transaction = new Transaction;
                $transaction->setLog($user->code,1,"The user has deposited ".$deposit." ",$userCurrency->acronym);

                return redirect()->route('index');
            case '2':
                return redirect()->route('firstLevelOfAuth',[
                    'option' => '2', 
                    'warning'  => "let's try again"
                ]);
            default:
                return redirect()->route('index');
        }
    }

    public function redirectWithdraw(Request $request){
        $option = $request->optionConfirm;

        switch ($option) {
            case '1':
                $api = new ApiController;
                $user = User::find(auth()->user()->code);
                $userCurrency = Currency::find($user->default_currency);
                $withdraw = $api->convertCurrency($request->amount, strtoupper($request->withdrawCurrency), $userCurrency->acronym);
                
                $user->balance = $user->balance - $withdraw;
                $user->save();

                $transaction = new Transaction;
                $transaction->setLog($user->code,2,"The user has deposited ".$withdraw." ",$userCurrency->acronym);
                
                return redirect()->route('index');
            case '2':
                return redirect()->route('firstLevelOfAuth',[
                    'option' => '3', 
                    'warning'  => "let's try again"
                ]);
            default:
                return redirect()->route('index');
        }
    }

    public function redirectBalance(Request $request){
        if(isset($request->optionConfirm) && $request->optionConfirm == 1){
            $transactions = Transaction::where('user','=',auth()->user()->code)->get();
            return view('accounts-menu.transaction')
                ->with(compact('transactions'));
        }else{
            return redirect()->route('index');
        }
    }

    public function redirectTransaction(Request $request){
        if(isset($request->optionConfirm) && $request->optionConfirm == 1){
            return redirect()->route('firstLevelOfAuth', ['option' => '4',]);
        }else{
            return redirect()->route('index');
        }
    }

}