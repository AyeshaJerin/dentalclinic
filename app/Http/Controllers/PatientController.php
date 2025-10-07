<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      // If phone query param present, return JSON for lookup
      if(request()->has('phone')){
         $phone = request()->query('phone');
         $patient = Patient::where('phone', $phone)->first();
         return response()->json($patient);
      }

      $data=Patient::get();
      return view('patient.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      Patient::create($request->all());
       return redirect()->route('patient.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
       return view('patient.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
       $patient->update($request->all());
       return redirect()->route('patient.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
       $patient->delete();
       return redirect()->route('patient.index');
    }
}
