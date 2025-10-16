@extends('layouts.doctor_panel')
@section('page_title',"Prescription Add")
@section('content')

<div class="col-lg-12">
    <div class="card">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">patient </th>
                    <th scope="col">age</th>
                    <th scope="col">inv</th>
                    <th scope="col">diagnosis</th>
                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $d)

                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{$d->patient?->name}}</td>
                        <td>{{$d->age}}</td>
                        <td>{{$d->inv}}</td>
                        <td>{{$d->diagnosis}}</td>
                        <td>
                            <a href="{{route('doctor_panel.prescription.show',$d->id)}}">Show</a><br>
                            <a href="{{route('doctor_panel.prescription.edit',$d->id)}}">Update</a>

                            <form method="post" action="{{route('doctor_panel.prescription.destroy',$d->id)}}">
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
