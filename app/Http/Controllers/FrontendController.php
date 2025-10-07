<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorSchedule;

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

    public function appointment_store(Request $request){


        return $request->all();

    }

}
