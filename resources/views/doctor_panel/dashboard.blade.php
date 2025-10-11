@extends('layouts.doctor_panel')

@section('page_title', 'Dashboard')

@section('content')
<div class="row mt-4">
    <!-- Doctor Count Card -->
    <div class="col-lg-3 col-md-6">
        <div class="card gradient-deepblue">
            <div class="card-body">
                <h5 class="text-white mb-0">12 <span class="float-right"><i class="fa fa-user-md"></i></span></h5>
                <p class="text-white mb-0">Total Doctors</p>
            </div>
        </div>
    </div>

    <!-- Patient Count Card -->
    <div class="col-lg-3 col-md-6">
        <div class="card gradient-orange">
            <div class="card-body">
                <h5 class="text-white mb-0">45 <span class="float-right"><i class="fa fa-users"></i></span></h5>
                <p class="text-white mb-0">Total Patients</p>
            </div>
        </div>
    </div>

    <!-- Appointments -->
    <div class="col-lg-3 col-md-6">
        <div class="card gradient-ohhappiness">
            <div class="card-body">
                <h5 class="text-white mb-0">30 <span class="float-right"><i class="fa fa-calendar"></i></span></h5>
                <p class="text-white mb-0">Today's Appointments</p>
            </div>
        </div>
    </div>

    <!-- Services -->
    <div class="col-lg-3 col-md-6">
        <div class="card gradient-ibiza">
            <div class="card-body">
                <h5 class="text-white mb-0">8 <span class="float-right"><i class="fa fa-medkit"></i></span></h5>
                <p class="text-white mb-0">Available Services</p>
            </div>
        </div>
    </div>
</div>

<!-- Chart Section -->
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Appointments Overview</div>
            <div class="card-body">
                <canvas id="appointmentChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">Quick Actions</div>
            <div class="card-body">
                <a href="{{ route('appointment.index') }}" class="btn btn-primary btn-block mb-2">View Appointments</a>
                <a href="{{ route('doctor.index') }}" class="btn btn-success btn-block mb-2">Manage Doctors</a>
                <a href="{{ route('patient.index') }}" class="btn btn-info btn-block mb-2">View Patients</a>
                <a href="{{ route('service.index') }}" class="btn btn-warning btn-block">Manage Services</a>
            </div>
        </div>
    </div>
</div>
@endsection
