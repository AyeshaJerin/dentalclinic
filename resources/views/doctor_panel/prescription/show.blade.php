@extends('layouts.doctor_panel')
@section('page_title', "Prescription")
@section('content')

@php
    // Expecting $prescription from controller: with('medicines','doctor','patient')
    $p = $prescription ?? null;
@endphp

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="text-white">Prescription</h4>
    <div>
        <button class="btn btn-primary btn-sm text-white" onclick="window.print()">Print</button>
        <a href="{{ route('doctor_panel.prescription.edit', $p->id ?? '') }}" class="btn btn-secondary btn-sm">Edit</a>
        <a href="{{ route('doctor_panel.prescription.index') }}" class="btn btn-light btn-sm">Back</a>
    </div>
</div>

<div class="card mb-4 text-dark" id="prescription-print-area">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5 class="mb-0 text-dark">{{ optional($p->doctor)->name ?? 'Doctor' }}</h5>
                <small class="text-dark">{{ optional($p->doctor)->designation ?? '' }}</small>
                <div>{{ optional($p->doctor)->phone ?? '' }}</div>
            </div>
            <div class="col-md-6 text-right">
                <strong>Date:</strong> {{ optional($p)->created_at ? $p->created_at->format('d M, Y') : now()->format('d M, Y') }}<br>
                <strong>Prescription ID:</strong> {{ $p->id ?? '' }}<br>
                <strong>Appointment ID:</strong> {{ $p->appointment_id ?? '' }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <h6 class="mb-1">Patient</h6>
                <div><strong>Name:</strong> {{ optional($p->patient)->name ?? '' }}</div>
                <div><strong>Phone:</strong> {{ optional($p->patient)->phone ?? '' }}</div>
                <div><strong>Age:</strong> {{ $p->age ?? '' }}</div>
            </div>
            <div class="col-md-6">
                <h6 class="mb-1">Clinical</h6>
                <div><strong>Diagnosis:</strong> {!! nl2br(e($p->diagnosis ?? '')) !!}</div>
                <div class="mt-2"><strong>Investigations:</strong> {!! nl2br(e($p->inv ?? '')) !!}</div>
                <div class="mt-2"><strong>Advice:</strong> {!! nl2br(e($p->advice ?? '')) !!}</div>
            </div>
        </div>

        <hr>

        <h6>Medicines</h6>
        <div class="table-responsive">
            <table class="table table-bordered table-sm text-dark">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Medicine</th>
                        <th>Dosage</th>
                        <th>Frequency</th>
                        <th>Duration</th>
                        <th>Instructions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($p && $p->medicines && $p->medicines->count())
                        @foreach($p->medicines as $i => $m)
                            <tr class="text-dark">
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $m->medicine_name }}</td>
                                <td>{{ $m->dosage }}</td>
                                <td>{{ $m->frequency }}</td>
                                <td>{{ $m->duration }}</td>
                                <td>{{ $m->instructions }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No medicines found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <strong>Signature:</strong>
            <div style="height:60px;border-bottom:1px solid #000;width:250px;margin-top:10px"></div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    @media print {
        body * { visibility: visible; }
        #prescription-print-area, #prescription-print-area * { visibility: visible; }
        /* hide navigation and other layout elements if your layout wraps content */
        .no-print, .navbar, .sidebar { display: none !important; }
        .card { box-shadow: none !important; }
    }
    /* small adjustments for screen */
    #prescription-print-area { background: #fff; padding: 15px; }
</style>
@endpush

