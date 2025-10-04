@extends('layouts.back')
@section('page_title',"Prescription Add")
@section('content')



<div class="col-lg-12">
    <div class="card">
    <div class="card-body">
        {{-- <h5 class="card-title">Basic Table</h5> --}}
        <a href="{{route('prescription.create')}}">Add new</a>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">appointment_id</th>
                    <th scope="col">doctor_id</th>
                    <th scope="col">patient_id </th>
                    <th scope="col">diagnosis</th>
                    <th scope="col">advice</th>



                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $d)

                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{$d->appointment_id}}</td>
                        <td>{{$d->doctor_id}}</td>
                        <td>{{$d->patient_id}}</td>
                        <td>{{$d->diagnosis}}</td>
                        <td>{{$d->advice}}</td>
                        


                        <td>
                            <a href="{{route('prescription.edit',$d->id)}}">Update</a>

                            <form method="post" action="{{route('prescription.destroy',$d->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            No data found
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    </div>
    </div>
</div>

@endsection
