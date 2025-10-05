

@extends('layouts.back')
@section('page_title',"Service Add")
@section('content')


 <div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Add Service</div>

           <hr>

           <form action="{{route('service.store')}}"  method="post">
            @csrf
           <div class="form-group">
            <label for="name">Name</label>
            <input type="text"  name="name"  class="form-control form-control-rounded" id="name">
           </div>
           <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description"  class="form-control form-control-rounded" id="description" >
           </div>
           <div class="form-group">
            <label for="price">Price </label>
            <input type="text" name="price" class="form-control form-control-rounded" id="price" >
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

