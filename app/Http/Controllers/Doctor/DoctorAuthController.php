<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorAuthController extends Controller
{
    public function login(){
        return view('doctor_panel.login');
    }

    public function checkLogin(Request $request){

        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if(auth()->guard('doctor')->attempt($credentials)){
            return redirect()->route('doctor_panel.dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials'])->withInput();
    }

    public function dashboard(){
        return view('doctor_panel.dashboard');
    }
}
