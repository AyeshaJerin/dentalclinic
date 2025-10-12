<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class DoctorAppointmentController extends Controller
{
    function index(){
        $data=Appointment::where('doctor_id',auth()->guard('doctor')->id())->get();
        return view('doctor_panel.appointment.index',compact('data'));
    }

    function create(){
        return view('doctor_panel.appointment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'schedule_id' => 'required|exists:doctor_schedules,id',
            'appointment_date' => 'required|date',
            'serial_number' => 'nullable|string',
        ]);

        // If patient_id provided (existing), use it. Otherwise try phone lookup, else create patient
        $patientId = $request->input('patient_id');

        if (!$patientId) {
            // If patient id not provided, try phone field or full patient form
            $phone = $request->input('phone') ?? $request->input('p_phone') ?? $request->input('lookup_phone') ?? null;
            if ($phone) {
                $patient = \App\Models\Patient::firstOrCreate(
                    ['phone' => $phone],
                    [
                        'name' => $request->input('name') ?? null,
                        'email' => $request->input('email') ?? null,
                        'password' => bcrypt('password'),
                        'gender' => $request->input('gender') ?? null,
                        'dob' => $request->input('dob') ?? null,
                        'address' => $request->input('address') ?? null,
                    ]
                );
                $patientId = $patient->id;
            }
        }


        $appointment = Appointment::create([
            'patient_id' => $patientId,
            'doctor_id' => $request->input('doctor_id'),
            'service_id' => $request->input('service_id'),
            'schedule_id' => $request->input('schedule_id'),
            'appointment_date' => $request->input('appointment_date'),
            'serial_number' => $request->input('serial_number'),
            'status' => 'pending',
        ]);

        return redirect()->route('doctor_panel.appointment.index')->with('success', 'Appointment created.');
    }


    //     public function edit($id)
    // {
    //     $appointment = Appointment::findOrFail($id);
    //     return view('doctor.appointment.edit', compact('appointment'));
    // }


    //     public function destroy($id)
    // {
    //     $appointment = Appointment::findOrFail($id);
    //     $appointment->delete();

    //     return redirect()->route('doctor.appointment.index')->with('success', 'Appointment deleted successfully.');
    // }


}
