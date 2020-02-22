@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-3"><span><i class="fas fa-file-signature"></i></span> Reports</h2>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header p-0">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item lead"><a href="#"><i class="far fa-folder-open"></i> Manage</a></li>
                            <li class="breadcrumb-item lead" aria-current="page"><i class="fas fa-file-signature"></i> Reports</li>
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
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($vehicle_reports as $vr) --}}
                                            <tr>
                                                <td>{{ $vehicle_reports->owner_id }}</td>
                                                {{-- <td>{{ $owner_reports->lastname }}, {{ $owner_reports->firstname }}</td> --}}
                                                <td>{{ $vehicle_reports->plate_no }}</td>
                                                <td>{{ $vehicle_reports->displacement }}</td>
                                                <td>{{ $vehicle_reports->cylinders }}</td>
                                                <td>{{ $vehicle_reports->fuel }}</td>
                                                <td>{{ $vehicle_reports->or_no }}</td>
                                                <td>{{ $vehicle_reports->cr_no }}</td>
                                                <td>{{ $vehicle_reports->manufacturer }}</td>
                                                <td>{{ $vehicle_reports->series }}</td>
                                                <td>{{ $vehicle_reports->body_type }}</td>
                                                <td>{{ $status }}</td>
                                                <td>{{ $report->created_at }}</td>
                                                <td>
                                                    <form action="" method="POST" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf

                                                        <button class="btn btn-outline-danger" type="submit"><i class="fa fa-close"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                {{-- @endforeach --}}
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        {{-- {{ $reports->links() }} --}}
                        <img src="http://222.234.0.28/~cebudiytech_WEB/ucmain_smoke_emission/imgs/report_{{ $report->id }}.jpg"
                         alt="">
            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection