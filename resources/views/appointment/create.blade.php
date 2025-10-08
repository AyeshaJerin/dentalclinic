

@extends('layouts.back')
@section('page_title',"Appointment Add")
@section('content')


 <div class="col-lg-6">
    <div class="card">
        <div class="card-body">
           <div class="card-title">Add Appointment</div>

           <hr>

           <form action="{{route('appointment.store')}}"  method="post">
            @csrf
           <div class="form-group">
            <label for="patient_id">Existing Patient ID (optional)</label>
            <input type="text"  name="patient_id"  class="form-control form-control-rounded" id="patient_id">
            <small class="form-text text-muted">If you know the patient id you can enter it here. Otherwise fill the patient details below or use phone lookup.</small>
           </div>

           <div class="form-group">
            <label for="lookup_phone">Lookup Patient by Phone (optional)</label>
            <input type="text" name="lookup_phone" id="lookup_phone" class="form-control form-control-rounded" placeholder="Enter phone to lookup existing patient">
            <small id="lookup_result" class="form-text text-muted"></small>
           </div>
           <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-control form-control-rounded">
                <option value="">-- Select Doctor --</option>
                @foreach($doctors as $doc)
                    <option value="{{ $doc->id }}">{{ $doc->name }} ({{ $doc->specialization ?? 'General' }})</option>
                @endforeach
            </select>
           </div>

           <div class="form-group">
            <label for="schedule_id">Schedule</label>
            <select name="schedule_id" id="schedule_id" class="form-control form-control-rounded">
                <option value="">-- Select Schedule --</option>
            </select>
            <small class="form-text text-muted">Select doctor first to load schedules.</small>
           </div>



           <div class="form-group">
            <label for="appointment_date">appointment_date</label>
            <input type="date" name="appointment_date" class="form-control form-control-rounded" id="appointment_date" >
           </div>

           <div class="form-group">
            <label for="serial_number">serial_number</label>
            <input type="text" name="serial_number" class="form-control form-control-rounded" id="serial_number" value="0">
           </div>

           <hr>
           <h5>Patient details (if not using existing patient)</h5>
           <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name" id="name" class="form-control form-control-rounded">
           </div>
           <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" id="email" class="form-control form-control-rounded">
           </div>
           <div class="form-group">
               <label for="phone">Phone</label>
               <input type="text" name="phone" id="phone" class="form-control form-control-rounded">
           </div>
           <div class="form-group">
               <label for="gender">Gender</label>
               <select name="gender" id="gender" class="form-control form-control-rounded">
                   <option value="male">Male</option>
                   <option value="female">Female</option>
                   <option value="other">Other</option>
               </select>
           </div>
           <div class="form-group">
               <label for="dob">Date of Birth</label>
               <input type="date" name="dob" id="dob" class="form-control form-control-rounded">
           </div>
           <div class="form-group">
               <label for="address">Address</label>
               <input type="text" name="address" id="address" class="form-control form-control-rounded">
           </div>

                     <div class="form-group">
                        <button type="submit" id="create_submit" class="btn btn-light btn-round px-5" disabled> Save</button>
                        <small id="availability_msg" class="form-text text-muted"></small>
                    </div>
          </form>
         </div>
         </div>
      </div>

{{-- <div class="update-form">
    <h2>Add Category</h2>
    <form action="{{route('category.store')}}"  method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter category name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Enter description">
        </div>
        <div class="form-group">
            <label for="created_by">Created By</label>
            <input type="text" name="created_by" id="created_by" placeholder="Enter creator name">
        </div>
        <button type="submit">Save</button>
    </form>
</div> --}}

@endsection

@push('scripts')
<script>
    document.getElementById('lookup_phone')?.addEventListener('blur', function(){
        const phone = this.value.trim();
        const resultEl = document.getElementById('lookup_result');
        if(!phone){ resultEl.textContent = ''; return; }
        fetch(`{{ url('patient') }}?phone=${encodeURIComponent(phone)}`)
            .then(r => r.json())
            .then(data => {
                if(data && data.id){
                    resultEl.textContent = `Found patient: ${data.name} (ID: ${data.id})`;
                    // optionally populate patient_id
                    document.getElementById('patient_id').value = data.id;
                } else {
                    resultEl.textContent = 'No patient found with that phone.';
                }
            }).catch(err => console.error(err));
    });
</script>
@endpush

@push('scripts')
<script>
    const schedulesUrl = (doctorId) => `{{ url('doctor') }}/${doctorId}/schedules`;
    const availabilityUrl = `{{ route('appointment.check_availability') }}`;

    // Load schedules when doctor changes
    document.getElementById('doctor_id')?.addEventListener('change', function(){
        const docId = this.value;
        const scheduleSelect = document.getElementById('schedule_id');
        scheduleSelect.innerHTML = '<option value="">-- Select Schedule --</option>';
        if(!docId) return;
        fetch(schedulesUrl(docId))
            .then(r => r.json())
            .then(data => {
                data.forEach(s => {
                    const opt = document.createElement('option');
                    opt.value = s.id;
                    opt.textContent = `${s.day_of_week} (${s.start_time} - ${s.end_time})`;
                    scheduleSelect.appendChild(opt);
                });
            });
    });

    // Check availability when schedule or date changes
    function checkAvailability(){
        const scheduleId = document.getElementById('schedule_id').value;
        const date = document.getElementById('appointment_date').value;
        const submitBtn = document.getElementById('create_submit');
        const msg = document.getElementById('availability_msg');
        submitBtn.disabled = true;
        msg.textContent = '';
        if(!scheduleId || !date) return;

        fetch(availabilityUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ schedule_id: scheduleId, appointment_date: date })
        })
        .then(r => r.json())
        .then(data => {
            if(data.available){
                submitBtn.disabled = false;
                msg.textContent = 'Slot is available.';
            } else {
                submitBtn.disabled = true;
                msg.textContent = `Slot already booked (${data.booked} bookings). Choose a different date or schedule.`;
            }
        }).catch(err => {
            console.error(err);
            msg.textContent = 'Could not check availability right now.';
        });
    }

    document.getElementById('schedule_id')?.addEventListener('change', checkAvailability);
    document.getElementById('appointment_date')?.addEventListener('change', checkAvailability);
</script>
@endpush

