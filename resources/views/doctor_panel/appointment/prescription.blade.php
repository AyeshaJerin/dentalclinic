@extends('layouts.doctor_panel')
@section('page_title', 'Prescription')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-2xl p-10 mt-10 mb-10">

    {{-- Clinic Header --}}
    <div class="text-center border-b pb-4 mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Smile Dental Care</h1>
        <p class="text-gray-600">123 Health Street, Dhaka</p>
        <p class="text-gray-600">Phone: +880 1234-567890</p>
    </div>

    {{-- Doctor & Patient Info --}}
    <div class="grid grid-cols-2 gap-6 mb-8">
        <div>
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Doctor Information</h2>
            <p><strong>Name:</strong> {{ $prescription->doctor->name ?? 'Dr. John Doe' }}</p>
            <p><strong>Specialization:</strong> {{ $prescription->doctor->specialization ?? 'Dental Surgeon' }}</p>
            <p><strong>Education:</strong> {{ $prescription->doctor->education ?? 'BDS, FCPS' }}</p>
        </div>
        <div>
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Patient Information</h2>
            <p><strong>Name:</strong> {{ $prescription->patient->name ?? 'Mr. Patient' }}</p>
            <p><strong>Age:</strong> {{ $prescription->patient->age ?? '—' }}</p>
            <p><strong>Date:</strong> {{ $prescription->created_at->format('d M Y') ?? now()->format('d M Y') }}</p>
        </div>
    </div>

    {{-- Diagnosis --}}
    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Diagnosis</h2>
        <p class="border p-4 rounded-lg min-h-[80px]">
            {{ $prescription->diagnosis ?? 'No diagnosis provided.' }}
        </p>
    </div>

    {{-- Medicines --}}
    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Medicines</h2>
        <table class="w-full border-collapse border border-gray-300 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">Medicine</th>
                    <th class="border px-4 py-2 text-left">Dosage</th>
                    <th class="border px-4 py-2 text-left">Frequency</th>
                    <th class="border px-4 py-2 text-left">Duration</th>
                    <th class="border px-4 py-2 text-left">Instructions</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($prescription->medicines) && count($prescription->medicines))
                    @foreach($prescription->medicines as $medicine)
                        <tr>
                            <td class="border px-4 py-2">{{ $medicine->medicine_name ?? '—' }}</td>
                            <td class="border px-4 py-2">{{ $medicine->dosage ?? '—' }}</td>
                            <td class="border px-4 py-2">{{ $medicine->frequency ?? '—' }}</td>
                            <td class="border px-4 py-2">{{ $medicine->duration ?? '—' }}</td>
                            <td class="border px-4 py-2">{{ $medicine->instructions ?? '—' }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="border px-4 py-4 text-center text-gray-500">
                            No medicines prescribed.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    {{-- Advice --}}
    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Doctor’s Advice</h2>
        <p class="border p-4 rounded-lg min-h-[80px]">
            {{ $prescription->advice ?? 'Take medicines on time and maintain good oral hygiene.' }}
        </p>
    </div>

    {{-- Footer --}}
    <div class="text-right pt-6 border-t mt-6">
        <p class="font-semibold text-gray-700">
            {{ $prescription->doctor->name ?? 'Dr. John Doe' }}
        </p>
        <p class="text-sm text-gray-600">Signature</p>
    </div>

</div>
@endsection
