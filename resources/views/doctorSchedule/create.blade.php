

@extends('layouts.back')
@section('page_title',"DoctorSchedule Add")
@section('content')


 <div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Add DoctorSchedule</div>

           <hr>

           <form action="{{route('doctorSchedule.store')}}"  method="post">
            @csrf
           <div class="form-group">
            <label for="doctor_id">doctor_id</label>
            <input type="text"  name="doctor_id"  class="form-control form-control-rounded" id="doctor_id">
           </div>
           <div class="form-group">
            <label for="day_of_week">day_of_week</label>
            <input type="text" name="day_of_week"  class="form-control form-control-rounded" id="day_of_week" >
           </div>
           <div class="form-group">
            <label for="start_time">start_time </label>
            <input type="text" name="start_time" class="form-control form-control-rounded" id="start_time" >
           </div>
           <div class="form-group">
            <label for="end_time">end_time </label>
            <input type="text" name="end_time" class="form-control form-control-rounded" id="end_time" >
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

