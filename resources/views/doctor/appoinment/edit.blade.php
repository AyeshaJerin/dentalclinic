{{--




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appointment</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #00695c, #0d47a1, #4a148c);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow-y: auto;
        }

        .update-form {
            background: rgba(255, 255, 255, 0.05);
            padding: 25px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
            width: 380px;
            color: #fff;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin: 20px 0;
        }

        .update-form h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #c5cae9;
            font-size: 14px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            font-size: 15px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            transition: 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #80cbc4;
            box-shadow: 0 0 6px rgba(128, 203, 196, 0.5);
            outline: none;
            background: rgba(255, 255, 255, 0.15);
        }

        .form-group select option {
            background: #1a237e;
            color: #fff;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #4a148c;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #311b92;
        }

        @media (max-width: 480px) {
            .update-form {
                width: 90%;
                padding: 20px 25px;
            }

            .update-form h2 {
                font-size: 20px;
            }

            .form-group label {
                font-size: 13px;
            }

            .form-group input,
            .form-group select {
                font-size: 14px;
                padding: 8px 10px;
            }

            button {
                font-size: 15px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<form action="{{ route('appointment.update', $appointment->id) }}" method="post" class="update-form">
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










 --}}
