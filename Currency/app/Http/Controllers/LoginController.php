<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $this->validateLogin($request);
        return $this->authenticate($request);
    }

    protected function validateLogin(Request $request){
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|string',
        ]);
    }

    protected function authenticate(Request $request){
        $user = User::where('email','=',$request->email)->where('password','=',md5($request->password))->get();

        if(sizeof($user)>0){
            Auth::login($user[0]);
            return redirect()->route('indexOfAuth');
        }else{
            return redirect()->route('firstLevel',[
                'option' => 2, 
                'error'  => 'Sorry, but you give me an incorrect username or password.'
            ]);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
