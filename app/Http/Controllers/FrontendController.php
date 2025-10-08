<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorSchedule;
use App\Models\Appointment;

class FrontendController extends Controller
{

    function welcome() {
        return view ('welcome');
    }

    function doctors() {
        $doctors=\App\Models\Doctor::get();
        return view ('doctors',compact('doctors'));
    }

    function application() {
        $doctors=\App\Models\Doctor::get();
        return view ('application',compact('doctors'));
    }

    public function doctorSchedules($id)
    {
        $schedules = DoctorSchedule::where('doctor_id', $id)->get();
        return response()->json($schedules);
    }

    public function appointment_store(Request $request)
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
        // return $request->all();
        return redirect()->route('appointment_ticket', ['appointment_id' => $appointment->id]);

    }

    public function appointment_ticket(Request $request) {
        $appointment = Appointment::with(['doctor', 'patient', 'schedule'])->find($request->query('appointment_id'));
        if (!$appointment) {
            return redirect()->back()->with('error', 'Appointment not found.');
        }
        return view('appointment_ticket', compact('appointment'));
    }

}
