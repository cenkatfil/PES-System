@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-3"><span><i class="fa fa-file-text-o"></i></span> Manufacturer</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <p class="lead m-0"><span><i class="fa fa-edit"></i></span> Add Manufacturer</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('manufacturer.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name"><strong>Name</strong></label>
                                <input type="text" class="form-control" placeholder="Manufacturer Name" name="name">
                            </div>
                            <input class="btn btn-primary" type="submit" value="Save">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header p-0">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item lead"><a href="#">Manage</a></li>
                            <li class="breadcrumb-item lead" aria-current="page">Manufacturer</li>
                          </ol>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped m-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($manufacturers as $manu)
                                    <tr>
                                        <td><a class="lead" href="{{ route('series.show', $manu->id) }}">{{ $manu->name }}</a></td>
                                        <td>
                                            <form action="{{ route('manufacturer.destroy', $manu->id) }}" method="POST">
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