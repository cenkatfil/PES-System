@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-3"><span><i class="fas fa-file-signature"></i></span> Reports</h2>
        {{-- <div class = "col-md-4 p-3 m-1 "> --}}
            <form action="/search" method="get">
                <div class = "input-group">
                    <input type = "search" name="search" class="form-control">
                    <span class ="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </span>
                </div>
            </form>
        {{-- </div> --}}
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
                                    <th>Officer</th>
                                    <th>Driver's Name</th>
                                    <th>Plate No.</th>
                                    <th>Status</th>
                                    <th>HC</th>
                                    <th>CO</th>
                                    <th>Result</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                            <tr>
                                                <td>{{ $report->sOfficerName }}</td>
                                                <td>{{ $report->driver }}</td>
                                                <td>{{ $report->plate_no }}</td>
                                                <td>{{ $report->status }}</td>
                                                <td>{{ $report->hc }}</td>
                                                <td>{{ $report->co }}</td>
                                                {{-- <td>{{ $report->results}}</td> --}}
                                                @if (($report->hc > 5833) || ($report->co > 5))
                                                    <td>FAIL</td>
                                                @else
                                                    <td>PASS</td>
                                                @endif
                                                <!--td>{{$report->hc}} </td-->
                                                <td>{{ $report->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('report.show', $report->id) }}" class="btn btn-outline-primary"><i class="far fa-eye"></i></a>
                                                    <form action="{{ route('report.destroy', $report->id) }}" method="POST" class="d-inline">
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
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $reports->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection