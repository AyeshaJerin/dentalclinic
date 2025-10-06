<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


}
