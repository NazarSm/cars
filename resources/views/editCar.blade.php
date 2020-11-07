@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="navbar navbar-toggleable-md navbar-light bg-faded">

                            <form method="POST" action="{{ route('cars.store') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <p>Brands :
                                        <select class="brand" id="brand" name="brand" required>
                                            <option></option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand['value'] }}">{{ $brand['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                </div>

                                <div class="form-group">
                                    <p>Models :
                                        <select class="model" id="model" name="model" required>
                                            <option></option>
                                        </select>
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input  type="text" name="name" id="name"  placeholder="name" required>
                                </div>

                                <div class="form-group">
                                    <label for="phoneNumber">Phone</label>
                                    <input  type="tel" name="phoneNumber" id="phoneNumber"  placeholder="380xx xxx xx xx" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input  type="text" name="email" id="email"  placeholder="email" required>
                                </div>

                                <button type="submit"  class="btn btn-success">Save</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


