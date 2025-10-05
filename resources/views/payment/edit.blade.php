


{{-- <form action="{{route('payment.update',$payment->id)}}" method="post" class="update-form">
    @csrf
    @method('PATCH')
    <h2>Update payment</h2>

    <div class="form-group">
        <label for="appointment_id">appointment_id</label>
        <input type="text" name="appointment_id" id="appointment_id" value="{{$payment->appointment_id}}">
    </div>

    <div class="form-group">
        <label for="patient_id">patient_id</label>
        <input type="text" name="patient_id" id="patient_id" value="{{$payment->patient_id}}">
    </div>

    <div class="form-group">
        <label for="amount">amount</label>
        <input type="text" name="amount" id="amount" value="{{$payment->amount}}">
    </div>


    <div class="form-group">
            <label for="payment_method"> payment_method</label>
            <select name="payment_method" id="payment_method" value="{{$payment->payment_method}}" class="form-control form-control-rounded">
                <option value="0">Cash</option>
                <option value="1">Card</option>
                <option value="2">Online</option>
            </select>
           </div>

         <div class="form-group">
            <label for="payment_status"> payment_status</label>
            <select name="payment_status" id="payment_status" value="{{$payment->dob}}"class="form-control form-control-rounded">
                <option value="0">paid</option>
                <option value="1">pending</option>
                <option value="2">unpaid</option>
            </select>
           </div>


           <div class="form-group">
            <label for="transaction_id">transaction_id</label>
            <input type="text" name="transaction_id" class="form-control form-control-rounded" id="transaction_id" value="{{$payment->transaction_id}}" >
           </div>



    <button type="submit">Update</button>
</form> --}}

{{-- <style>
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
</style> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Payment</title>
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

<form action="{{ route('payment.update', $payment->id) }}" method="post" class="update-form">
    @csrf
    @method('PATCH')
    <h2>Update Payment</h2>

    <div class="form-group">
        <label for="appointment_id">Appointment ID</label>
        <input type="text" name="appointment_id" id="appointment_id" value="{{ $payment->appointment_id }}">
    </div>

    <div class="form-group">
        <label for="patient_id">Patient ID</label>
        <input type="text" name="patient_id" id="patient_id" value="{{ $payment->patient_id }}">
    </div>

    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="text" name="amount" id="amount" value="{{ $payment->amount }}">
    </div>

    <div class="form-group">
        <label for="payment_method">Payment Method</label>
        <select name="payment_method" id="payment_method">
            <option value="0" {{ $payment->payment_method == 0 ? 'selected' : '' }}>Cash</option>
            <option value="1" {{ $payment->payment_method == 1 ? 'selected' : '' }}>Card</option>
            <option value="2" {{ $payment->payment_method == 2 ? 'selected' : '' }}>Online</option>
        </select>
    </div>

    <div class="form-group">
        <label for="payment_status">Payment Status</label>
        <select name="payment_status" id="payment_status">
            <option value="0" {{ $payment->payment_status == 0 ? 'selected' : '' }}>Paid</option>
            <option value="1" {{ $payment->payment_status == 1 ? 'selected' : '' }}>Pending</option>
            <option value="2" {{ $payment->payment_status == 2 ? 'selected' : '' }}>Unpaid</option>
        </select>
    </div>

    <div class="form-group">
        <label for="transaction_id">Transaction ID</label>
        <input type="text" name="transaction_id" id="transaction_id" value="{{ $payment->transaction_id }}">
    </div>

    <button type="submit">Update</button>
</form>

</body>
</html>









