<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $data=Appointment::get();
        return view('appointment.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::all();
        return view('appointment.create', compact('doctors'));
    }

    /**
     * Check availability (AJAX) for a given schedule and date.
     */
    public function checkAvailability(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:doctor_schedules,id',
            'appointment_date' => 'required|date',
        ]);

        $scheduleId = $request->input('schedule_id');
        $date = $request->input('appointment_date');

        $count = Appointment::where('schedule_id', $scheduleId)
            ->where('appointment_date', $date)
            ->where('status', '!=', 'cancel')
            ->count();

        return response()->json([
            'available' => $count === 0,
            'booked' => $count,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
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

        // Conflict check: prevent double-booking for the same schedule + date
        $scheduleId = $request->input('schedule_id');
        $apptDate = $request->input('appointment_date');
        $conflict = Appointment::where('schedule_id', $scheduleId)
            ->where('appointment_date', $apptDate)
            ->where('status', '!=', 'cancel')
            ->exists();

        if ($conflict) {
            return redirect()->back()->with('error', 'Selected slot is already booked for that date. Please choose another date or time.')->withInput();
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

        return redirect()->route('appointment.index')->with('success', 'Appointment created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
       return view('appointment.edit',compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
       $appointment->update($request->all());
       return redirect()->route('appointment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
      $appointment->delete();
       return redirect()->route('appointment.index');
    }


    // prescription
    public function prescription()
    {
      $data=Appointment::get();
        return view('appointment.prescription',compact('data'));
    }
}
