

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
            <label for="patient_id">patient_id</label>
            <input type="text"  name="patient_id"  class="form-control form-control-rounded" id="patient_id">
           </div>
           <div class="form-group">
            <label for="doctor_id">doctor_id</label>
            <input type="text" name="doctor_id"  class="form-control form-control-rounded" id="doctor_id" >
           </div>
           <div class="form-group">
            <label for="service_id">service_id </label>
            <input type="text" name="service_id" class="form-control form-control-rounded" id="service_id" >
           </div>
           <div class="form-group">
            <label for="schedule_id">schedule_id </label>
            <input type="text" name="schedule_id" class="form-control form-control-rounded" id="schedule_id" >
           </div>



           <div class="form-group">
            <label for="appointment_date">appointment_date</label>
            <input type="date" name="appointment_date" class="form-control form-control-rounded" id="appointment_date" >
           </div>

           <div class="form-group">
            <label for="serial_number">serial_number</label>
            <input type="text" name="serial_number" class="form-control form-control-rounded" id="serial_number" >
           </div>
           <div class="form-group">
            <label for="status"> Status</label>
            <select name="status" id="status" class="form-control form-control-rounded">
                <option value="">Pending</option>
                <option value="">Approved</option>
                <option value="">Rejected</option>
                <option value="">Completed</option>

            </select>
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

