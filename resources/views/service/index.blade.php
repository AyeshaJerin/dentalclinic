@extends('layouts.back')
@section('page_title',"Service Add")
@section('content')



<div class="col-lg-12">
    <div class="card">
    <div class="card-body">
        {{-- <h5 class="card-title">Basic Table</h5> --}}
        <a href="{{route('service.create')}}">Add new</a>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">descripton</th>
                    <th scope="col">price </th>


                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $d)

                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->descripton}}</td>
                        <td>{{$d->price}}</td>
                       

                        <td>
                            <a href="{{route('service.edit',$d->id)}}">Update</a>

                            <form method="post" action="{{route('service.destroy',$d->id)}}">
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
