@extends('layouts.app')

@section('content')
    <div class="container">
    
        <h2 class="mb-3"><span><i class="fas fa-car"></i></span> Vehicles</h2>
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
                                    <th>Owner</th>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $vehicle)
                                @foreach ($owners as $owner)
                                @if ($vehicle->owner_id == $owner->id)
                                    <tr>
                                        <td>{{ $owner->lastname }}, {{ $owner->firstname }}</td>
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
                                            <form action="" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <button class="btn btn-outline-danger" type="submit"><i class="fa fa-close"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        {{-- {{ $vehicles->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection