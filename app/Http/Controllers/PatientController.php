<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patients;


class PatientController extends Controller
{
    public function index()
    {
        return view('patient-login');
    }

    public function register()
    {
        return view('patient-register');
    }

    public function save_register(Request $req)
    {
     
        $patient = new Patients();
        $patient->name = $req->input('name');
        $patient->email = $req->input('email');
        $patient->password = $req->input('password');
      
        $patient->save();
       
        return redirect()->route('patient-login')->with('success', 'Patient registered successfully. Please login.');
    }
    public function login(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');
    

        $patient = Patients::where('email', $email)->first();
    
        if ($patient && $patient->password === $password) {
           
            return redirect()->route('dashboard');
        } else {

            return redirect()->route('patient-login')->with('error', 'Invalid credentials. Please try again.');
        }
    }

public function dashboard(){
    return view ('dashboard');
}

}
