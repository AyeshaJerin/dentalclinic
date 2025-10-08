

@extends('layouts.back')
@section('page_title',"Doctor Add")
@section('content')


 <div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Add Doctor</div>

           <hr>
            <form action="{{ route('doctor.update', $doctor->id) }}" method="post" class="update-form">
                @csrf
                @method('PATCH')
                <h2>Update Doctor</h2>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control form-control-rounded" value="{{ $doctor->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control form-control-rounded" value="{{ $doctor->email }}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control form-control-rounded" value="{{ $doctor->password }}">
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control form-control-rounded" value="{{ $doctor->phone }}">
                </div>

                <div class="form-group">
                    <label for="specialization">Specialization</label>
                    <input type="text" name="specialization" id="specialization" class="form-control form-control-rounded" value="{{ $doctor->specialization }}">
                </div>

                <div class="form-group">
                    <label for="education">Education</label>
                    <input type="text" name="education" id="education" class="form-control form-control-rounded" value="{{ $doctor->education }}">
                </div>

                <div class="form-group">
                    <label for="experience_years">Experience (Years)</label>
                    <input type="text" name="experience_years" id="experience_years" class="form-control form-control-rounded" value="{{ $doctor->experience_years }}">
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control form-control-rounded">
                        <option value="0" {{ $doctor->gender == 0 ? 'selected' : '' }}>Male</option>
                        <option value="1" {{ $doctor->gender == 1 ? 'selected' : '' }}>Female</option>
                        <option value="2" {{ $doctor->gender == 2 ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control form-control-rounded" value="{{ $doctor->address }}">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status"  class="form-control form-control-rounded">
                        <option value="0" {{ $doctor->status == 0 ? 'selected' : '' }}>Inactive</option>
                        <option value="1" {{ $doctor->status == 1 ? 'selected' : '' }}>Active</option>
                    </select>
                </div>

                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection













