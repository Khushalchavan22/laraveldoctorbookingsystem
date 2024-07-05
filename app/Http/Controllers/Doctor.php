<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Doctor extends Controller
{
    public function index()
    {
        return view('Doctor-login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

       
        if ($username === 'admin' && $password === 'admin123') {
         
            return redirect()->route('appointments.index')->with('success', 'Login successful.');
        } else {
       
            return redirect()->back()->with('error', 'Invalid username or password.');
        }
    }
    public function dashboard(){
        return view('Doctor-dashboard');
    }
}
