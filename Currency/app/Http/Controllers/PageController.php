<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        //Redirect property set
        $url    = route('firstLevel');
        $option = $request->option;
        $error  = isset($request->error) ? $request->error : "";
        $email  = isset($request->email) && $this->verifyEmail($request->email) ? $request->email : "";        
        $method = $email=='' ? 'get' : 'post';
        $name   = isset($request->name) ? $request->name : "";
        
        //Email validation 
        $error = isset($request->email) && !$this->verifyEmail($request->email) ? 'Your email not valid email' : $error ;

        switch ($option) {
            case '1':
                return view('first-level.exchange');
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

    private function verifyEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

}