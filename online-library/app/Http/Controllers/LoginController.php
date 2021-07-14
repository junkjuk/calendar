<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    
    public function login(Request $request)
    {

        if( Auth::check()){
            return redirect(route('user.index'));
        }

        $formFields = $request->only(['email','password']);

        if(Auth::attempt($formFields)){
            return redirect()->intended(route('user.index'));
        }
        return redirect(route('user.login'))->withErrors([
            'email' => 'Помилка авторизації'
        ]);
    }
}
