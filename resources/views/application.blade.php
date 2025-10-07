


@extends('layouts.master')
@section('content')
<section id="team" data-stellar-background-ratio="1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Make an Appointment</div>
                        <hr>

                        <div class="mb-3">
                            <label for="doctor_select">Choose Doctor</label>
                            <select id="doctor_select" class="form-control">
                                <option value="">-- Select Doctor --</option>
                                @foreach($doctors as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }} ({{ $d->specialization ?? 'General' }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="schedules_section" style="display:none">
                            <h5>Available Days</h5>
                            <div id="days_list" class="mb-3"></div>

                            <h5>Time Slots for <span id="selected_day"></span></h5>
                            <div id="time_slots" class="mb-3"></div>
                        </div>

                        <hr>

                        <form id="appointment_form" action="{{ route('appointment_store') }}" method="post">
                            @csrf
                            <input type="hidden" name="doctor_id" id="form_doctor_id">
                            <input type="hidden" name="schedule_id" id="form_schedule_id">
                            <input type="hidden" name="appointment_date" id="form_appointment_date">
                            <input type="hidden" name="serial_number" value="0">

                            <div id="patient_lookup_section" class="mb-3">
                                <label for="lookup_phone">Registered Patient Phone (enter to lookup)</label>
                                <input id="lookup_phone" class="form-control" placeholder="Enter phone to check if registered">
                                <div id="patient_lookup_result" class="mt-2"></div>
                            </div>

                            <div id="patient_full_form" style="display:none">
                                <h5>Patient Details</h5>
                                <div class="form-group">
                                    <label for="p_name">Name</label>
                                    <input type="text" name="name" id="p_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="p_email">Email</label>
                                    <input type="email" name="email" id="p_email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="p_phone">Phone</label>
                                    <input type="text" name="phone" id="p_phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="p_gender">Gender</label>
                                    <select name="gender" id="p_gender" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="p_dob">Date of Birth</label>
                                    <input type="date" name="dob" id="p_dob" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="p_address">Address</label>
                                    <input type="text" name="address" id="p_address" class="form-control">
                                </div>
                            </div>

                            <div id="patient_phone_only" style="display:none">
                                <h5>Confirm as Registered Patient</h5>
                                <p>Patient: <span id="reg_patient_name"></span></p>
                                <input type="hidden" name="patient_id" id="form_patient_id">
                            </div>



                            <button id="submit_btn" type="submit" class="btn btn-primary mt-3" style="display:none">Confirm Appointment</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const schedulesUrl = (doctorId) => `{{ url('doctor') }}/${doctorId}/schedules`;

    document.getElementById('doctor_select').addEventListener('change', function(){
        const id = this.value;
        document.getElementById('form_doctor_id').value = id;
        if(!id) { document.getElementById('schedules_section').style.display='none'; return; }
        fetch(schedulesUrl(id))
            .then(r => r.json())
            .then(data => {
                const daysList = document.getElementById('days_list');
                daysList.innerHTML = '';
                // group by day_of_week
                const byDay = {};
                data.forEach(s => {
                    if(!byDay[s.day_of_week]) byDay[s.day_of_week] = [];
                    byDay[s.day_of_week].push(s);
                });
                for(const day in byDay){
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = 'btn btn-outline-secondary m-1';
                    btn.textContent = day;
                    btn.addEventListener('click', () => showSlotsForDay(day, byDay[day]));
                    daysList.appendChild(btn);
                }
                document.getElementById('schedules_section').style.display='block';
            });
    });

    function showSlotsForDay(day, schedules){
        document.getElementById('selected_day').textContent = day;
        const slots = document.getElementById('time_slots');
        slots.innerHTML = '';
        schedules.forEach(s => {
            const div = document.createElement('div');
            div.className = 'd-flex align-items-center mb-2';
            const timeText = document.createElement('div');
            timeText.textContent = `${s.start_time} - ${s.end_time}`;
            const pickBtn = document.createElement('button');
            pickBtn.type = 'button';
            pickBtn.className = 'btn btn-sm btn-success ms-3';
            pickBtn.textContent = 'Pick';
            pickBtn.addEventListener('click', () => {
                // set schedule and date (date not enforced here; patient will pick or today's date)
                document.getElementById('form_schedule_id').value = s.id;
                document.getElementById('form_appointment_date').value = new Date().toISOString().slice(0,10);
                document.getElementById('submit_btn').style.display = 'inline-block';
                window.scrollTo({top: document.getElementById('appointment_form').offsetTop, behavior: 'smooth'});
            });
            div.appendChild(timeText);
            div.appendChild(pickBtn);
            slots.appendChild(div);
        });
    }

    // patient lookup by phone
    document.getElementById('lookup_phone').addEventListener('blur', function(){
        const phone = this.value.trim();
        if(!phone) return;
        fetch(`{{ url('patient') }}?phone=${encodeURIComponent(phone)}`)
            .then(r => r.json())
            .then(data => {
                const res = document.getElementById('patient_lookup_result');
                if(data && data.id){
                    res.innerHTML = `<div class="alert alert-success">Found patient: ${data.name}</div>`;
                    document.getElementById('patient_phone_only').style.display = 'block';
                    document.getElementById('reg_patient_name').textContent = data.name;
                    document.getElementById('form_patient_id').value = data.id;
                    document.getElementById('patient_full_form').style.display = 'none';
                } else {
                    res.innerHTML = `<div class="alert alert-info">No patient found. Please fill the full patient form.</div>`;
                    document.getElementById('patient_full_form').style.display = 'block';
                    document.getElementById('patient_phone_only').style.display = 'none';
                }
            }).catch(err => console.error(err));
    });
</script>

@endsection

