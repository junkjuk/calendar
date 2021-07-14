<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    

    public function save(Request $request){

        if( Auth::check()){
            return redirect(route('user.index'));
        }

        $validateFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);


        // $flight = User::where('email', $validateFields['email'])->value('email');

        // if($flight = $validateFields['email']){
        //     return redirect(route('user.registration'))->withErrors([
        //         'email' => $flight, $validateFields['email']
        //     ]);
        // }


        $user = User::create($validateFields);
        if($user){
            Auth::login($user);
            return redirect(route('user.index'));
        }
        return redirect(route('user.login'))->withErrors([
            'formError' => 'error'
        ]);
    }
}
