
<form action="{{ route('doctor_panel.appointment.update', $appointment->id) }}" method="post" class="update-form">
    @csrf
    @method('PATCH')
    <h2>Update Appointment</h2>

    <div class="form-group">
        <label for="patient_id">Patient ID</label>
        <input type="text" name="patient_id" id="patient_id" value="{{ $appointment->patient_id }}">
    </div>

    <div class="form-group">
        <label for="doctor_id">Doctor ID</label>
        <input type="text" name="doctor_id" id="doctor_id" value="{{ $appointment->doctor_id }}">
    </div>

    <div class="form-group">
        <label for="service_id">Service ID</label>
        <input type="text" name="service_id" id="service_id" value="{{ $appointment->service_id }}">
    </div>

    <div class="form-group">
        <label for="schedule_id">Schedule ID</label>
        <input type="text" name="schedule_id" id="schedule_id" value="{{ $appointment->schedule_id }}">
    </div>

    <div class="form-group">
        <label for="appointment_date">Appointment Date</label>
        <input type="date" name="appointment_date" id="appointment_date" value="{{ $appointment->appointment_date }}">
    </div>

    <div class="form-group">
        <label for="serial_number">Serial Number</label>
        <input type="text" name="serial_number" id="serial_number" value="{{ $appointment->serial_number }}">
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="approved" {{ $appointment->status == 'approved' ? 'selected' : '' }}>Approved</option>
            <option value="rejected" {{ $appointment->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

    <button type="submit">Update</button>
</form>

</body>
</html>











