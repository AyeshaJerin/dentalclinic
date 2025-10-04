


<form action="{{route('appointment.update',$appointment->id)}}" method="post" class="update-form">
    @csrf
    @method('PATCH')
    <h2>Update patient</h2>

    <div class="form-group">
        <label for="patient_id">patient_id</label>
        <input type="text" name="patient_id" id="patient_id" value="{{$appointment->patient_id}}">
    </div>

    <div class="form-group">
        <label for="doctor_id">doctor_id</label>
        <input type="text" name="doctor_id" id="doctor_id" value="{{$appointment->doctor_id}}">
    </div>

    <div class="form-group">
        <label for="service_id">service_id</label>
        <input type="text" name="service_id" id="service_id" value="{{$appointment->service_id}}">
    </div>


    <div class="form-group">
        <label for="schedule_id">schedule_id</label>
        <input type="text" name="schedule_id" id="schedule_id" value="{{$appointment->schedule_id}}">
    </div>


    <div class="form-group">
        <label for="appointment_date">appointment_date</label>
        <input type="date" name="appointment_date" class="form-control form-control-rounded" id="appointment_date"   value="{{$appointment->appointment_date}}">
    </div>
    <div class="form-group">
        <label for="serial_number">serial_number</label>
        <input type="text" name="serial_number" id="serial_number" value="{{$appointment->serial_number}}">
    </div>
    <div class="form-group">
        <label for="status">status</label>
        <input type="text" name="status" id="status" value="{{$appointment->status}}">
    </div>


    <button type="submit">Update</button>
</form>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #00695c, #0d47a1, #4a148c); /* match form colors */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .update-form {
        background: rgba(255,255,255,0.05); /* slightly translucent to show background gradient */
        padding: 35px 40px;
        border-radius: 18px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.5);
        width: 420px;
        color: #fff;
        backdrop-filter: blur(10px); /* subtle blur for glass effect */
        border: 1px solid rgba(255,255,255,0.2);
    }

    .update-form h2 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 26px;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #c5cae9;
    }

    .form-group input {
        width: 100%;
        padding: 14px 16px;
        border: 1.5px solid rgba(255,255,255,0.3);
        border-radius: 12px;
        font-size: 15px;
        background: rgba(255,255,255,0.1);
        color: #fff;
        transition: 0.3s;
    }

    .form-group input::placeholder {
        color: rgba(255,255,255,0.6);
    }

    .form-group input:focus {
        border-color: #80cbc4;
        box-shadow: 0 0 10px rgba(128,203,196,0.5);
        outline: none;
        background: rgba(255,255,255,0.15);
    }

    button {
        width: 100%;
        padding: 14px;
        background: #4a148c;
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background: #311b92;
    }
</style>




{{-- <form action="{{route('category.update',$category->id)}}"  method="post">
    @csrf
    @method('PATCH')
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{$category->name}}">
    </div>
    <div>
        <label for="description">Description </label>
        <input type="text" name="description" id="description" value="{{$category->description}}">
    </div>
    <div>
        <label for="created_by">Created_by</label>
        <input type="text" name="created_by" id="created_by" value="{{$category->created_by}}">
    </div>

    <div>
        <button type="submit">Update</button>
    </div>
</form> --}}




