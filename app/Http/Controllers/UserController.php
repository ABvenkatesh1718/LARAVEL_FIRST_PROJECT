<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function register(Request $request){
        
        $incomingFields=$request->validate( [
            'name'=>['required','min:3','max:20'],
            'email'=>['required','email'],
            'password'=>['required','min:2','max:20']
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $incomingFields['password']=bcrypt($incomingFields['password']);//automatic bcrypted password!
        $user=User::create($incomingFields);

        auth()->login($user);
        
        return redirect('/');
    }



    public function login(Request $request){

        $incomingFields=$request->validate([
            'loginname'=>'required',
            'loginpassword'=>'required'
        ]);

        if(auth()->attempt(['name'=>$incomingFields['loginname'],'password'=>$incomingFields['loginpassword']])){
            $request->session();
        }
        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
