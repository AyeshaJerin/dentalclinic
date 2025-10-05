


{{-- <form action="{{route('patient.update',$patient->id)}}" method="post" class="update-form">
    @csrf
    @method('PATCH')
    <h2>Update patient</h2>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{$patient->name}}">
    </div>

    <div class="form-group">
        <label for="email">email</label>
        <input type="text" name="email" id="email" value="{{$patient->email}}">
    </div>

    <div class="form-group">
        <label for="password">password</label>
        <input type="text" name="password" id="password" value="{{$patient->password}}">
    </div>


    <div class="form-group">
        <label for="phone">phone</label>
        <input type="text" name="phone" id="phone" value="{{$patient->phone}}">
    </div>

        <div class="form-group">
            <label for="gender"> Gender</label>
            <select name="gender" id="gender" value="{{$patient->gender}}" class="form-control form-control-rounded">
                <option value="0">Male</option>
                <option value="1">Female</option>
                <option value="2">Other</option>
            </select>
        </div>
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" class="form-control form-control-rounded" id="dob"   value="{{$patient->dob}}">
    </div>
    <div class="form-group">
        <label for="address">address</label>
        <input type="text" name="address" id="address" value="{{$patient->address}}">
    </div>
    <div class="form-group">
        <label for="blood_group">Blood group</label>
        <input type="text" name="blood_group" id="blood_group" value="{{$patient->blood_group}}">
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
    <title>Update Patient</title>
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
            padding: 20px 25px;
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
            font-size: 17px;
            font-weight: 600;
            letter-spacing: 0.4px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #c5cae9;
            font-size: 12px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            font-size: 13px;
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
            padding: 10px;
            background: #4a148c;
            color: #fff;
            font-size: 14px;
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
                padding: 15px 20px;
            }

            .update-form h2 {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

<form action="{{ route('patient.update', $patient->id) }}" method="post" class="update-form">
    @csrf
    @method('PATCH')
    <h2>Update Patient</h2>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $patient->name }}">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{ $patient->email }}">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" name="password" id="password" value="{{ $patient->password }}">
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ $patient->phone }}">
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value="0" {{ $patient->gender == 0 ? 'selected' : '' }}>Male</option>
            <option value="1" {{ $patient->gender == 1 ? 'selected' : '' }}>Female</option>
            <option value="2" {{ $patient->gender == 2 ? 'selected' : '' }}>Other</option>
        </select>
    </div>

    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" id="dob" value="{{ $patient->dob }}">
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="{{ $patient->address }}">
    </div>

    <div class="form-group">
        <label for="blood_group">Blood Group</label>
        <input type="text" name="blood_group" id="blood_group" value="{{ $patient->blood_group }}">
    </div>

    <button type="submit">Update</button>
</form>

</body>
</html>










