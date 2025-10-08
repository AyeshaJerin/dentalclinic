@extends('layouts.back')
@section('page_title',"Appointment Add")
@section('content')



<div class="col-lg-12">
    <div class="card">
    <div class="card-body">
        {{-- <h5 class="card-title">Basic Table</h5> --}}
        <a href="{{route('appointment.create')}}">Add new</a>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">patient</th>
                    <th scope="col">doctor</th>
                    <th scope="col">schedule</th>
                    <th scope="col">appointment_date</th>
                    <th scope="col">serial_number</th>
                    <th scope="col">status</th>


                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $d)

                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{$d->patient?->name}}</td>
                        <td>{{$d->doctor?->name}}</td>
                        <td>{{$d->schedule?->day_of_week}}</td>
                        <td>{{$d->appointment_date}}</td>
                        <td>{{$d->serial_number}}</td>
                        <td>{{$d->status}}</td>
                        <td>
                            <a href="{{route('appointment.prescription',$d->id)}}">Prescription</a>

                            <a href="{{route('appointment.edit',$d->id)}}">Update</a>
                            <form method="post" action="{{route('appointment.destroy',$d->id)}}">
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
