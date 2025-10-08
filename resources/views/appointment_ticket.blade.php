@extends('layouts.master')
@section('content')
<section id="team" data-stellar-background-ratio="1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Appointment Ticket</div>
                        <hr>
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <h3>Appointment Details</h3>
                        <p><strong>Appointment ID:</strong> {{ $appointment->id }}</p>
                        <p><strong>Doctor:</strong> {{ $appointment->doctor->name }} ({{ $appointment->doctor->specialization ?? 'General' }})</p>
                        <p><strong>Patient:</strong> {{ $appointment->patient->name }}</p>
                        <p><strong>Contact:</strong> {{ $appointment->patient->phone }}</p>
                        <p><strong>Appointment Date:</strong> {{ $appointment->appointment_date }}</p>
                        <p><strong>Time Slot:</strong> {{ $appointment->schedule->day_of_week }} {{ $appointment->schedule->start_time }} - {{ $appointment->schedule->end_time }}</p>
                        <p><strong>Serial Number:</strong> {{ $appointment->serial_number }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($appointment->status) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
