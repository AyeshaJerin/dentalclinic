


@extends('layouts.master')
{{-- @section('page_title',"Patient Add") --}}
@section('content')


 <div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Add Patient</div>

           <hr>

           <form action="{{route('patient.store')}}"  method="post">
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
            <label for="gender"> Gender</label>
            <select name="gender" id="gender" class="form-control form-control-rounded">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
           </div>

           <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" class="form-control form-control-rounded" id="dob" >
           </div>
           <div class="form-group">
            <label for="address">address</label>
            <input type="text" name="address" class="form-control form-control-rounded" id="address" >
           </div>
           <div class="form-group">
            <label for="blood_group">Blood Group</label>
            <input type="text" name="blood_group" class="form-control form-control-rounded" id="blood_group" >
           </div>

           <div class="form-group">
            <button type="submit" class="btn btn-light btn-round px-5"> Save</button>
          </div>
          </form>
         </div>
         </div>
      </div>



@endsection

