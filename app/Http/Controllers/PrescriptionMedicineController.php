<?php

namespace App\Http\Controllers;

use App\Models\PrescriptionMedicine;
use Illuminate\Http\Request;

class PrescriptionMedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data=PrescriptionMedicine::get();
        return view('prescriptionMedicine.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('prescriptionMedicine.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       PrescriptionMedicine::create($request->all());
       return redirect()->route('prescriptionMedicine.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PrescriptionMedicine $prescriptionMedicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrescriptionMedicine $prescriptionMedicine)
    {
        return view('prescriptionMedicine.edit',compact('prescriptionMedicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrescriptionMedicine $prescriptionMedicine)
    {
        $prescriptionMedicine->update($request->all());
       return redirect()->route('prescriptionMedicine.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrescriptionMedicine $prescriptionMedicine)
    {
         $prescriptionMedicine->delete();
       return redirect()->route('prescriptionMedicine.index');
    }
}
