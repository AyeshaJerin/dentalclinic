@extends('layouts.back')
@section('page_title',"PrescriptionMedicine Add")
@section('content')



<div class="col-lg-12">
    <div class="card">
    <div class="card-body">
        {{-- <h5 class="card-title">Basic Table</h5> --}}
        <a href="{{route('prescriptionMedicine.create')}}">Add new</a>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">prescription_id</th>
                    <th scope="col">medicine_name</th>
                    <th scope="col">dosage </th>
                    <th scope="col">frequency</th>
                    <th scope="col">duration</th>
                    <th scope="col">instructions </th>


                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $d)

                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{$d->prescription_id}}</td>
                        <td>{{$d->medicine_name}}</td>
                        <td>{{$d->dosage}}</td>
                        <td>{{$d->frequency}}</td>
                        <td>{{$d->duration}}</td>
                        <td>{{$d->instructions}}</td>


                        <td>
                            <a href="{{route('prescriptionMedicine.edit',$d->id)}}">Update</a>

                            <form method="post" action="{{route('prescriptionMedicine.destroy',$d->id)}}">
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
