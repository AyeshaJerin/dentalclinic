@extends('layouts.back')
@section('page_title',"Payment Add")
@section('content')



<div class="col-lg-12">
    <div class="card">
    <div class="card-body">
        {{-- <h5 class="card-title">Basic Table</h5> --}}
        <a href="{{route('payment.create')}}">Add new</a>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">appointment_id</th>
                    <th scope="col">patient_id</th>
                    <th scope="col">amount </th>
                    <th scope="col">payment_method</th>
                    <th scope="col">payment_status</th>
                    <th scope="col">transaction_id </th>


                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $d)

                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{$d->appointment_id}}</td>
                        <td>{{$d->patient_id}}</td>
                        <td>{{$d->amount}}</td>
                        <td>{{$d->payment_method}}</td>
                        <td>{{$d->payment_status}}</td>
                        <td>{{$d->transaction_id}}</td>


                        <td>
                            <a href="{{route('payment.edit',$d->id)}}">Update</a>

                            <form method="post" action="{{route('payment.destroy',$d->id)}}">
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
