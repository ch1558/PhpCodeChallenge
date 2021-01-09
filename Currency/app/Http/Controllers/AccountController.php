<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;

class AccountController extends Controller{
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        return view('accounts-fl.index');
    }

    public function firstLevel(Request $request){
        //Redirect property set
        $url    = route('firstLevel');
        $option = $request->option;

        switch ($option) {
            case 6:
                $loginController = new LoginController;
                return $loginController->logout($request);
            default:
                return redirect()->route("indexOfAuth");
        }
    }

    private function convertAPI(){
        $apiKey = 'hw8fKNEcHScx8awebMAxsmpTxvcbj2';
        $currency1 = 'EUR';
        $currency2 = 'GBP';
        
        $url = "https://www.amdoren.com/api/currency.php?api_key=$apiKey&from=$currency1&to=$currency2";
        
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $json_string = curl_exec($ch);
        
        return $json_string;
    }

}
