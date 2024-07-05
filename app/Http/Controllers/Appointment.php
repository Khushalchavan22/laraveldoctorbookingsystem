<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointments;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Log;

class Appointment extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function saveAppointment(Request $request)
    {
        $appointment = new Appointments();
        $appointment->patient_name = $request->input('patient_name');
        $appointment->patient_email = $request->input('patient_email');
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->appointment_date = $request->input('appointment_date');
        $appointment->appointment_time = $request->input('appointment_time');

        $appointment->save();

        return redirect()->route('dashboard')->with('success', 'Appointment booked successfully.');
    }

    public function showAppointments()
    {
        $appointments = Appointments::all();
        return view('Doctor-dashboard', compact('appointments'));
    }

    public function showAppointmentsByDate(Request $request)
{
   
    $date = $request->input('date');
    if (!$date) {
      
        return redirect()->route('appointments.index')->with('error', 'Date parameter is missing.');
    }
   
    $appointments = Appointments::whereDate('appointment_date', $date)->get();
 
    return view('Doctor-dashboard', compact('appointments'));
}

    public function reject($id)
    {
        $appointment = Appointments::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $appointment = Appointments::findOrFail($id);
        return view('edit-appointment', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointments::findOrFail($id);
        $appointment->appointment_date = $request->input('appointment_date');
        $appointment->appointment_time = $request->input('appointment_time');
        $appointment->save();

        return redirect()->route('appointments.index')->with('success', 'Appointment postponed successfully.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); 
    }
}
