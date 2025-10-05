

@extends('layouts.back')
@section('page_title',"PrescriptionMedicine Add")
@section('content')


 <div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Add Prescription Medicine</div>

           <hr>

           <form action="{{route('prescriptionMedicine.store')}}"  method="post">
            @csrf
           <div class="form-group">
            <label for="prescription_id">prescription id</label>
            <input type="text"  name="prescription_id"  class="form-control form-control-rounded" id="prescription_id">
           </div>
           <div class="form-group">
            <label for="medicine_name">medicine name</label>
            <input type="text" name="medicine_name"  class="form-control form-control-rounded" id="medicine_name" >
           </div>
           <div class="form-group">
            <label for="dosage">dosage </label>
            <input type="text" name="dosage" class="form-control form-control-rounded" id="dosage" >
           </div>
           <div class="form-group">
            <label for="frequency">frequency </label>
            <input type="text" name="frequency" class="form-control form-control-rounded" id="frequency" >
           </div>



           <div class="form-group">
            <label for="duration">duration </label>
            <input type="text" name="duration" class="form-control form-control-rounded" id="duration" >
           </div>
           <div class="form-group">
            <label for="instructions">instructions</label>
            <input type="text" name="instructions" class="form-control form-control-rounded" id="instructions" >
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

