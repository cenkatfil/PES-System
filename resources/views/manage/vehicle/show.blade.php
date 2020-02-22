@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('owner.index') }}" class="btn btn-secondary mb-3"><i class="fa fa-arrow-circle-left"></i> Go Back</a>
        <h2 class="mb-3"><span><i class="fas fa-car"></i></span> Vehicles of {{ $owner->firstname }}</h2>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <p class="lead m-0"><i class="fas fa-plus-square"></i></span> Add Vehicle</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vehicle.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="owner_id" value="{{ $owner->id }}">
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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header p-0">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item lead"><a href="#"><i class="far fa-folder-open"></i> Manage</a></li>
                            <li class="breadcrumb-item lead" aria-current="page"><i class="fas fa-car"></i> Vehicles</li>
                          </ol>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped m-0">
                            <thead>
                                <tr>
                                    
                                    <th>Plate No.</th>
                                    <th>Displacement</th>
                                    <th>Cylinders</th>
                                    <th>Fuel</th>
                                    <th>OR No.</th>
                                    <th>CR No.</th>
                                    <th>Manufacturer</th>
                                    <th>Series</th>
                                    <th>Body Type</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $vehicle)
                                    <tr>
                                        
                                        <td>{{ $vehicle->plate_no }}</td>
                                        <td>{{ $vehicle->displacement }}</td>
                                        <td>{{ $vehicle->cylinders }}</td>
                                        <td>{{ $vehicle->fuel }}</td>
                                        <td>{{ $vehicle->or_no }}</td>
                                        <td>{{ $vehicle->cr_no }}</td>
                                        <td>{{ $vehicle->manufacturer }}</td>
                                        <td>{{ $vehicle->series }}</td>
                                        <td>{{ $vehicle->body_type }}</td>
                                        <td>
                                         {{-- <a href="{{ route('vehicle.edit', $vehicle->id) }}" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a> --}}
                                        </td>
                                        <td>
                                            <form action="{{ route('vehicle.destroy', $vehicle->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <button class="btn btn-outline-danger" type="submit"><i class="fa fa-close"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection