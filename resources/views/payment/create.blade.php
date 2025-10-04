

@extends('layouts.back')
@section('page_title',"Payment Add")
@section('content')


 <div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Add Payment</div>

           <hr>

           <form action="{{route('payment.store')}}"  method="post">
            @csrf
           <div class="form-group">
            <label for="appointment_id">appointment_id</label>
            <input type="text"  name="appointment_id"  class="form-control form-control-rounded" id="appointment_id">
           </div>
           <div class="form-group">
            <label for="patient_id">patient_id</label>
            <input type="text" name="patient_id"  class="form-control form-control-rounded" id="patient_id" >
           </div>
           <div class="form-group">
            <label for="amount">amount </label>
            <input type="text" name="amount" class="form-control form-control-rounded" id="amount" >
           </div>


           <div class="form-group">
            <label for="payment_method"> payment_method</label>
            <select name="payment_method" id="payment_method" class="form-control form-control-rounded">
                <option value="0">Cash</option>
                <option value="1">Card</option>
                <option value="2">Online</option>
            </select>
           </div>



           <div class="form-group">
            <label for="payment_status"> payment_status</label>
            <select name="payment_status" id="payment_status" class="form-control form-control-rounded">
                <option value="0">paid</option>
                <option value="1">pending</option>
                <option value="2">unpaid</option>
            </select>
           </div>



           <div class="form-group">
            <label for="transaction_id">transaction_id</label>
            <input type="text" name="transaction_id" class="form-control form-control-rounded" id="transaction_id" >
           </div>


           <div class="form-group">
            <button type="submit" class="btn btn-light btn-round px-5"> Save</button>
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

