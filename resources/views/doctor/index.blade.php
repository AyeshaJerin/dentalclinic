@extends('layouts.back')
@section('page_title',"Doctor Add")
@section('content')



<div class="col-lg-12">
    <div class="card">
    <div class="card-body">
        {{-- <h5 class="card-title">Basic Table</h5> --}}
        <a href="{{route('doctor.create')}}">Add new</a>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">password </th>
                    <th scope="col">phone</th>
                    <th scope="col">specialization</th>
                    <th scope="col">education</th>
                    <th scope="col">experience_years</th>
                    <th scope="col">gender</th>
                    <th scope="col">address</th>
                    <th scope="col">status</th>
                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $d)

                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->email}}</td>
                        <td>{{$d->password}}</td>
                        <td>{{$d->phone}}</td>
                        <td>{{$d->specialization}}</td>
                        <td>{{$d->education}}</td>
                        <td>{{$d->experience_years}}</td>
                        <td>{{$d->gender}}</td>
                        <td>{{$d->address}}</td>
                        <td>{{$d->status}}</td>

                        <td>
                            <a href="{{route('doctor.edit',$d->id)}}">Update</a>

                            <form method="post" action="{{route('doctor.destroy',$d->id)}}">
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
