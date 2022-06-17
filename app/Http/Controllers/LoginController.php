<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) {

        if ($request->input('pin') == env('PIN')) {
            $request->session()->put('authenticated', true);
            return redirect()->route('agenda');
        }
    
        return view('auth.login', [
            'message' => 'Provided PIN is invalid. ',
        ]);
    }
}
