

@extends('layouts.back')
@section('page_title',"Doctor Add")
@section('content')


 <div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Add Doctor</div>

           <hr>

           <form action="{{route('doctor.store')}}"  method="post">
            @csrf
           <div class="form-group">
            <label for="name">Name</label>
            <input type="text"  name="name"  class="form-control form-control-rounded" id="name">
           </div>
           <div class="form-group">
            <label for="email">email</label>
            <input type="text" name="email"  class="form-control form-control-rounded" id="email" >
           </div>
           <div class="form-group">
            <label for="password">password </label>
            <input type="text" name="password" class="form-control form-control-rounded" id="password" >
           </div>
           <div class="form-group">
            <label for="phone">phone </label>
            <input type="text" name="phone" class="form-control form-control-rounded" id="phone" >
           </div>
           <div class="form-group">
            <label for="specialization">specialization</label>
            <input type="text" name="specialization" class="form-control form-control-rounded" id="specialization" >
           </div>
           <div class="form-group">
            <label for="education">education</label>
            <input type="text" name="education" class="form-control form-control-rounded" id="education" >
           </div>
           <div class="form-group">
            <label for="experience_years">experience_years</label>
            <input type="text" name="experience_years" class="form-control form-control-rounded" id="experience_years" >
           </div>
           <div class="form-group">
            <label for="gender">gender</label>
            <input type="text" name="gender" class="form-control form-control-rounded" id="gender" >
           </div>
           <div class="form-group">
            <label for="address">address</label>
            <input type="text" name="address" class="form-control form-control-rounded" id="address" >
           </div>
           <div class="form-group">
            <label for="status">status</label>
            <input type="text" name="status" class="form-control form-control-rounded" id="status" >
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

