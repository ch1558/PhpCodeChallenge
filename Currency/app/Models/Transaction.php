<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model{
    
    protected $table = 'transaction';
    protected $primaryKey = 'code';

    public function setLog($user, $type, $description){
        $newTransaction = new Transaction;

        $newTransaction->user = $user;
        $newTransaction->description = $type;
        $newTransaction->type_transaction = $description." from the ip: ".$this->get_client_ip();

        $newTransaction->save();
    }

    private function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }


}
