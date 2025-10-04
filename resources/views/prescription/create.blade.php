

@extends('layouts.back')
@section('page_title',"Prescription Add")
@section('content')


 <div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Add Prescription</div>

           <hr>

           <form action="{{route('prescription.store')}}"  method="post">
            @csrf
           <div class="form-group">
            <label for="appointment_id">appointment_id</label>
            <input type="text"  name="appointment_id"  class="form-control form-control-rounded" id="appointment_id">
           </div>
           <div class="form-group">
            <label for="doctor_id">doctor_id</label>
            <input type="text" name="doctor_id"  class="form-control form-control-rounded" id="doctor_id" >
           </div>
           <div class="form-group">
            <label for="patient_id">patient_id </label>
            <input type="text" name="patient_id" class="form-control form-control-rounded" id="patient_id" >
           </div>
           <div class="form-group">
            <label for="diagnosis">diagnosis </label>
            <input type="text" name="diagnosis" class="form-control form-control-rounded" id="diagnosis" >
           </div>



           <div class="form-group">
            <label for="advice">advice</label>
            <input type="text" name="advice" class="form-control form-control-rounded" id="advice" >
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

