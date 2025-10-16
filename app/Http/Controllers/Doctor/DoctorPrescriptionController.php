<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Models\PrescriptionMedicine;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class DoctorPrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Prescription::where('doctor_id',auth()->guard('doctor')->id())->get();
        return view('doctor_panel.prescription.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if($request->has('appointment_id') ){
            $prescription = Prescription::where('appointment_id',$request->appointment_id)->first();
            if($prescription){
                return redirect()->route('doctor_panel.prescription.show',$prescription->id)->with('error','Prescription already created for this appointment');
            }
        }
        return view('doctor_panel.prescription.create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'appointment_id' => 'nullable|integer|exists:appointments,id',
            'doctor_id' => 'required|integer|exists:doctors,id',
            'patient_id' => 'nullable|integer|exists:patients,id',
            'age' => 'nullable',
            'inv' => 'nullable|string',
            'diagnosis' => 'nullable|string',
            'advice' => 'nullable|string',
            'medicines' => 'required|array|min:1',
            'medicines.*.medicine_name' => 'required|string|max:191',
            'medicines.*.dosage' => 'nullable|string|max:191',
            'medicines.*.frequency' => 'nullable|string|max:191',
            'medicines.*.duration' => 'nullable|string|max:191',
            'medicines.*.instructions' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {

            $prescription = Prescription::create([
                'appointment_id' => $data['appointment_id'] ?? null,
                'doctor_id' => $data['doctor_id'],
                'patient_id' => $data['patient_id'] ?? null,
                'diagnosis' => $data['diagnosis'] ?? null,
                'advice' => $data['advice'] ?? null,
                'inv' => $data['inv'] ?? null,
                'age' => $data['age'] ?? null,
            ]);

            foreach ($data['medicines'] as $med) {
                if (empty($med['medicine_name'])) continue;
                PrescriptionMedicine::create([
                    'prescription_id' => $prescription->id,
                    'medicine_name' => $med['medicine_name'],
                    'dosage' => $med['dosage'] ?? null,
                    'frequency' => $med['frequency'] ?? null,
                    'duration' => $med['duration'] ?? null,
                    'instructions' => $med['instructions'] ?? null,
                ]);
            }

            DB::commit();
            return redirect()->route('doctor_panel.prescription.index')->with('success', 'Prescription saved successfully');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            return back()->withInput()->with('error', 'Failed to save prescription: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prescription = Prescription::with('medicines','doctor')->findOrFail($id);
        $patients = Patient::all();
        return view('doctor_panel.prescription.show', compact('prescription', 'patients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prescription = Prescription::with('medicines')->findOrFail($id);
        $patients = Patient::all();
        return view('doctor_panel.prescription.edit', compact('prescription', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prescription = Prescription::findOrFail($id);
        $data = $request->validate([
            'appointment_id' => 'nullable|integer|exists:appointments,id',
            'doctor_id' => 'required|integer|exists:doctors,id',
            'patient_id' => 'nullable|integer|exists:patients,id',
            'age' => 'nullable',
            'inv' => 'nullable|string',
            'diagnosis' => 'nullable|string',
            'advice' => 'nullable|string',
            'medicines' => 'required|array|min:1',
            'medicines.*.medicine_name' => 'required|string|max:191',
            'medicines.*.dosage' => 'nullable|string|max:191',
            'medicines.*.frequency' => 'nullable|string|max:191',
            'medicines.*.duration' => 'nullable|string|max:191',
            'medicines.*.instructions' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $prescription->update([
                'appointment_id' => $data['appointment_id'] ?? null,
                'doctor_id' => $data['doctor_id'],
                'patient_id' => $data['patient_id'] ?? null,
                'diagnosis' => $data['diagnosis'] ?? null,
                'advice' => $data['advice'] ?? null,
                'inv' => $data['inv'] ?? null,
                'age' => $data['age'] ?? null,
            ]);

            // Replace medicines: remove existing then create new ones
            PrescriptionMedicine::where('prescription_id', $prescription->id)->delete();

            foreach ($data['medicines'] as $med) {
                if (empty($med['medicine_name'])) continue;
                PrescriptionMedicine::create([
                    'prescription_id' => $prescription->id,
                    'medicine_name' => $med['medicine_name'],
                    'dosage' => $med['dosage'] ?? null,
                    'frequency' => $med['frequency'] ?? null,
                    'duration' => $med['duration'] ?? null,
                    'instructions' => $med['instructions'] ?? null,
                ]);
            }

            DB::commit();
            return redirect()->route('doctor_panel.prescription.show', $prescription->id)->with('success', 'Prescription updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return back()->withInput()->with('error', 'Failed to update prescription: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
