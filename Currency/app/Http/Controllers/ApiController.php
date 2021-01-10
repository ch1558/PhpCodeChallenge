<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class ApiController extends Controller{

    public function convertCurrency($amount, $currentCurrency, $newCurrency){   
        $apiKey = 'hw8fKNEcHScx8awebMAxsmpTxvcbj2';
        $apiUrl = 'https://www.amdoren.com/api/';

        $url = $apiUrl.'currency.php?api_key='.$apiKey.
                '&from='.$currentCurrency.
                '&to='.$newCurrency;

        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json_string = curl_exec($ch);
        $parsed_json = json_decode($json_string, true);

        return $parsed_json['amount']*$amount;
    }

    public function isValidCurrency($currency){
        if(isset($currency)){
            $currency = Currency::where('acronym','=',$currency)->get();
            return sizeof($currency)>0 ? $currency[0]->acronym : 'invalid';
        }else{
            return "";
        }
    }

    public function exchangeMoney($amount, $currentCurrency, $newCurrency){
        if($this->isValidCurrency($currentCurrency)==$currentCurrency && $this->isValidCurrency($newCurrency)==$newCurrency && $amount>0){
            return '$'.$amount.' '.
                    $currentCurrency.' is equal to $'.
                    $this->convertCurrency($amount, $currentCurrency, $newCurrency).' '.
                    $newCurrency;
        }else{
            return '';
        }
    }

}