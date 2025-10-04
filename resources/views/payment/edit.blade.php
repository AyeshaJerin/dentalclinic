


<form action="{{route('payment.update',$payment->id)}}" method="post" class="update-form">
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




