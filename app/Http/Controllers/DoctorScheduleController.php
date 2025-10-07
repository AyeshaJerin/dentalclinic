<?php

namespace App\Http\Controllers;

use App\Models\DoctorSchedule;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=DoctorSchedule::get();
        return view('doctorSchedule.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors=Doctor::get();
        return view('doctorSchedule.create',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DoctorSchedule::create($request->all());
       return redirect()->route('doctorSchedule.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(DoctorSchedule $doctorSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoctorSchedule $doctorSchedule)
    {
        return view('doctorSchedule.edit',compact('doctorSchedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DoctorSchedule $doctorSchedule)
    {
        $doctorSchedule->update($request->all());
       return redirect()->route('doctorSchedule.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoctorSchedule $doctorSchedule)
    {
         $doctorSchedule->delete();
       return redirect()->route('doctorSchedule.index');
    }
}
