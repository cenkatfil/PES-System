@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('owner.create') }}" class="btn btn-secondary mb-3"><i class="fas fa-plus-square"></i> New Owner</a>
        <h2 class="mb-3"><span><i class="fas fa-user-friends"></i></span> Owners</h2>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header p-0">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item lead"><a href="#"><i class="far fa-folder-open"></i> Manage</a></li>
                            <li class="breadcrumb-item lead" aria-current="page"><i class="fas fa-user-friends"></i> Owners</li>
                          </ol>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped m-0">
                            <thead>
                                <tr>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Address</th>
                                    <th>Contact No.</th>
                                    <th>License No.</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($owners as $own)
                                    <tr>
                                        <td>{{ $own->lastname }}</td>
                                        <td>{{ $own->firstname }}</td>
                                        <td>{{ $own->address }}</td>
                                        <td>{{ $own->contact_no }}</td>
                                        <td>{{ $own->license_no }}</td>
                                        <td>
                                            <a href="{{ route('vehicle.show', $own->id) }}" class="btn btn-outline-primary"><i class="fa fa-car"></i></a>
                                            <form action="{{ route('owner.destroy', $own->id) }}" method="POST" class="d-inline">
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