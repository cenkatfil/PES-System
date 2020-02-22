@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><i class="fas fa-chalkboard-teacher"></i> Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>Reports of {{ $user->name }}</h4>
                    <table class="table table-striped m-0">
                        <thead>
                            <tr>
                                <th>Officer</th>
                                {{-- <th>FullName</th> --}}
                                <th>Driver's Name</th>
                                <th>Plate No.</th>
                                <th>Status</th>
                                <th>HC</th>
                                <th>CO</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                {{-- @foreach ($owners as $owner) --}}
                                    @if ($report->sOfficerName == $user->name)
                                        <tr>
                                            <td>{{ $report->sOfficerName }}</td>
                                            {{-- <td>{{ $owner->lastname}}, {{ $owner->firstname}}</td> --}}
                                            <td>{{ $report->driver }}</td>
                                            <td>{{ $report->plate_no }}</td>
                                            <td>{{ $report->status }}</td>
                                            <td>{{ $report->hc }}</td>
                                            <td>{{ $report->co }}</td>
                                            <td>{{ $report->created_at }}</td>
                                            <td>
                                                {{-- <a href="" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a> --}}
                                                <a href="" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>
                                                {{-- <form action="" method="POST" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf

                                                    <button class="btn btn-outline-danger" type="submit"><i class="fa fa-close"></i></button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endif
                                {{-- @endforeach --}}
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
