@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="" class="btn btn-secondary mb-3"><i class="fa fa-arrow-circle-left"></i> Go Back</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <p class="lead m-0"><i class="fas fa-plus-square"></i></span> New Owner</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vehicle.store') }}" method="POST">
                            @csrf
                            <div class="row">
                            <div class="form-group col-md-6">
                                <label for="lastname"><strong>Plate No.</strong></label>
                                <input type="text" class="form-control" placeholder="Plate No." name="plate_no">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname"><strong>Displacement</strong></label>
                                <input type="text" class="form-control" placeholder="Displacement" name="displacement">
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="cylinders"><strong>Cylinders</strong></label>
                                <input type="text" class="form-control" placeholder="Cylinders" name="cylinders">
                            </div>
                            <div class="row">
                            <div class="form-group col-md-6">
                                <label for="fuel"><strong>Fuel</strong></label>
                                <input type="text" class="form-control" placeholder="Fuel" name="fuel">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="license_no"><strong>Or No.</strong></label>
                                <input type="text" class="form-control" placeholder="Or No." name="or_no">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="license_no"><strong>Cr No.</strong></label>
                                <input type="text" class="form-control" placeholder="Cr No." name="cr_no">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="manufacturer"><strong>Manufacturer</strong></label>
                                <select class="form-control" name="manufacturer">
                                    @foreach ($manus as $manu)
                                        <option>{{ $manu->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="series"><strong>Series</strong></label>
                                <select class="form-control" name="series">
                                    @foreach ($series as $seri)
                                    <option>{{ $seri->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="body_type"><strong>Body Type</strong></label>
                                <select class="form-control" name="body_type">
                                    @foreach ($body_types as $body)
                                        <option>{{ $body->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection