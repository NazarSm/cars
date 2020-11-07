@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="navbar navbar-toggleable-md navbar-light bg-faded">
                        <a type="button" href="{{ route('cars.create') }}">New car</a>
                    </div>

                    <table class="table table hover btn-sm" id="table">
                        <thead class="thead-light">
                        <tr>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>

                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($cars as $car)
                            <tr>
                                <td><b>{{ $car->brand }}</b></td>
                                <td><b>{{ $car->model }}</b></td>
                                <td><b>{{ $car->name }}</b></td>
                                <td><b>{{ $car->phoneNumber }}</b></td>
                                <td><b>{{ $car->email }}</b></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>


                </div>
            </div>
        </div>
    </div>
@endsection
