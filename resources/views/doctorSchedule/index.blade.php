@extends('layouts.back')
@section('page_title',"DoctorSchedule Add")
@section('content')



<div class="col-lg-12">
    <div class="card">
    <div class="card-body">
        {{-- <h5 class="card-title">Basic Table</h5> --}}
        <a href="{{route('doctorSchedule.create')}}">Add new</a>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">doctor_id</th>
                    <th scope="col">day_of_week</th>
                    <th scope="col">start_time </th>
                    <th scope="col">end_time</th>


                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $days = [
                        1 => 'Monday',
                        2 => 'Tuesday',
                        3 => 'Wednesday',
                        4 => 'Thursday',
                        5 => 'Friday',
                        6 => 'Saturday',
                        7 => 'Sunday',
                    ];
                @endphp
                @forelse($data as $d)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{$d->doctor?->name}}</td>
                        <td>{{$days[$d->day_of_week]}}</td>
                        <td>{{$d->start_time}}</td>
                        <td>{{$d->end_time}}</td>


                        <td>
                            <a href="{{route('doctorSchedule.edit',$d->id)}}">Update</a>

                            <form method="post" action="{{route('doctorSchedule.destroy',$d->id)}}">
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
