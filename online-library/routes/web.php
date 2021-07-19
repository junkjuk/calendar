<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    if(Auth::check()){
        return view('login');
    }
    return view('login');
});



Route::name('user.')->group(function(){
    Route::view('/index', 'index')->middleware('auth')->name('index');

    Route::get('/login',function(){
        if(Auth::check()){
            return redirect(route('user.index'));
        }
        return view('login');
    })->name('login');

    Route::post('/login',[\App\Http\Controllers\LoginController::class, 'login']);

    Route::get('/logout',function(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/'); 
    })->name('logout');

    Route::get('registration', function(){
        if(Auth::check()){
            return redirect(route('user.index'));
        }
        return view('registration');
    })->name('registration');

    Route::post('registration',[\App\Http\Controllers\RegisterController::class, 'save']);
});
