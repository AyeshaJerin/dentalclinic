@extends('layouts.doctor_panel')
@section('page_title',"Prescription Add")
@section('content')
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Add Prescription</div>

           <hr>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('doctor_panel.prescription.store') }}"  method="post">
            @csrf
            <input type="text"  name="appointment_id" id="appointment_id" value="{{ old('appointment_id',$request->appointment_id) }}">
            <input type="text"  name="doctor_id" id="doctor_id" value="{{ old('doctor_id',auth()->guard('doctor')->id()) }}">
            <input type="text"  name="patient_id" id="patient_id" value="{{ old('patient_id',$request->patient_id) }}">

            <h5>Patient Information</h5>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="age">Age</label>
                <input type="text" name="age" id="age" class="form-control" value="{{ old('age') }}">
            </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="diagnosis">diagnosis </label>
                        <textarea name="diagnosis" class="form-control form-control-rounded" id="diagnosis">{{ old('diagnosis') }}</textarea>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="inv">Inv </label>
                        <textarea name="inv" class="form-control form-control-rounded" id="inv">{{ old('inv') }}</textarea>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="advice">advice </label>
                        <textarea name="advice" class="form-control form-control-rounded" id="advice">{{ old('advice') }}</textarea>
                    </div>
                </div>
            </div>
           <hr>
           <h5>Medicines</h5>
           <div id="medicines-wrapper">
               <div class="medicine-row mb-2 row">
                   <div class="col-md-3">
                       <input type="text" name="medicines[0][medicine_name]" class="form-control" placeholder="Medicine name">
                   </div>
                   <div class="col-md-2">
                       <input type="text" name="medicines[0][dosage]" class="form-control" placeholder="Dosage">
                   </div>
                   <div class="col-md-2">
                       <input type="text" name="medicines[0][frequency]" class="form-control" placeholder="Frequency">
                   </div>
                   <div class="col-md-2">
                       <input type="text" name="medicines[0][duration]" class="form-control" placeholder="Duration">
                   </div>
                   <div class="col-md-2">
                       <input type="text" name="medicines[0][instructions]" class="form-control" placeholder="Instructions">
                   </div>
                   <div class="col-md-1">
                       <button type="button" class="btn btn-danger btn-sm remove-medicine">-</button>
                   </div>
               </div>
           </div>
           <div class="form-group mt-2">
               <button type="button" id="add-medicine" class="btn btn-primary btn-sm">Add medicine</button>
           </div>

           <div class="form-group mt-3">
            <button type="submit" class="btn btn-light btn-round px-5"> Save</button>
          </div>
          </form>
         </div>
         </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function(){
        let idx = 1;
        document.getElementById('add-medicine').addEventListener('click', function(){
            const wrapper = document.getElementById('medicines-wrapper');
            const row = document.createElement('div');
            row.className = 'medicine-row mb-2 row';
            row.innerHTML = `
                <div class="col-md-3">
                    <input type="text" name="medicines[${idx}][medicine_name]" class="form-control" placeholder="Medicine name">
                </div>
                <div class="col-md-2">
                    <input type="text" name="medicines[${idx}][dosage]" class="form-control" placeholder="Dosage">
                </div>
                <div class="col-md-2">
                    <input type="text" name="medicines[${idx}][frequency]" class="form-control" placeholder="Frequency">
                </div>
                <div class="col-md-2">
                    <input type="text" name="medicines[${idx}][duration]" class="form-control" placeholder="Duration">
                </div>
                <div class="col-md-2">
                    <input type="text" name="medicines[${idx}][instructions]" class="form-control" placeholder="Instructions">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger btn-sm remove-medicine">-</button>
                </div>
            `;
            wrapper.appendChild(row);
            idx++;
        });

        document.addEventListener('click', function(e){
            if (e.target && e.target.matches('.remove-medicine')){
                const row = e.target.closest('.medicine-row');
                if (row) row.remove();
            }
        });
    })();
</script>
@endpush

