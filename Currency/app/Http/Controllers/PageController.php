<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route;

class PageController extends Controller{
    
    public function index(){
        if(Auth::check()){
            return redirect()->route('indexOfAuth');
        }

        return view('index');
    }

    public function firstLevel(Request $request){
        if(Auth::check()){
            return redirect()->route('indexOfAuth');
        }
        $api = new ApiController;

        //Redirect property set
        $url    = route('firstLevel');
        $option = $request->option;
        $error  = isset($request->error) ? $request->error : "";
        $email  = isset($request->email) && $this->verifyEmail($request->email) ? $request->email : "";        
        $method = $email=='' ? 'get' : 'post';
        $name   = isset($request->name) ? $request->name : "";
        $amount = isset($request->amount) && is_numeric($request->amount)? $request->amount : 0;

        //Email validation 
        $error = isset($request->email) && !$this->verifyEmail($request->email) ? 'Your email not valid email' : $error ;

        switch ($option) {
            case '1':
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
            case '2':          
                $url = $method=='post' ? route('login') : $url;

                return view('first-level.login')
                    ->with('url',    $url)
                    ->with('email',  $email)
                    ->with('method', $method)
                    ->with('option', $option)
                    ->with('error',  $error);
            case '3':           
                if(User::where('email','=',$email)->count()>0){
                    $email  = "";
                    $error  = 'Your email already in use';
                    $method = 'get';
                }

                $url = $method=='post' ? route('register') : $url;

                return view('first-level.singin')
                    ->with('url',    $url)
                    ->with('name',   $name)
                    ->with('email',  $email)
                    ->with('method', $method)
                    ->with('option', $option)
                    ->with('error',  $error);
            default:
                return redirect()->route("index");
        }
    }

    public function register(Request $request){
        $newUser = new User;

        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = md5($request->password);

        $newUser->save();
        Auth::login($newUser);
        return redirect('/');
    }

    public function redirectExchange(Request $request){
        $option = $request->option;

        switch ($option) {
            case '1':
                if(Auth::check()){
                    return redirect()->route('firstLevelOfAuth', ['option' => 1]);
                }else{
                    return redirect()->route('firstLevel', ['option' => 1]);
                }
            default:
                return redirect()->route('index');
        }
    }

    private function verifyEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

}