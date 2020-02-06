@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('manufacturer.index') }}" class="btn btn-secondary mb-3"><i class="fa fa-arrow-circle-left"></i> Go Back</a>
        <h2 class="mb-3"><span><i class="fa fa-file-text-o"></i></span> Series</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <p class="lead m-0"><span><i class="fa fa-edit"></i></span> Add Series  </p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('series.update', $series->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="manu_id" value="{{ $manu->id }}">

                            <div class="form-group">
                                <label for="name"><strong>Name</strong></label>
                                <input type="text" class="form-control" placeholder="Series Name" name="name" value="{{ $series->name }}">
                            </div>
                            <input class="btn btn-primary" type="submit" value="Update">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header p-0">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item lead"><a href="#"><i class="far fa-folder-open"> Manage</i></a></li>
                            <li class="breadcrumb-item lead"><a href="{{ route('manufacturer.index') }}"><i class="fa fa-file-text-o"></i> Manufacturer</a></li>
                            <li class="breadcrumb-item lead" aria-current="page"><i class="fab fa-staylinked"></i> Series</li>
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
                                @foreach ($series as $ser)
                                    <tr>
                                        <td>{{ $ser->name }}</td>
                                        <td>
                                            <a href="{{ route('series.edit', $ser->id) }}" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                            <form class="d-inline" action="{{ route('series.destroy', $ser->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <button class="btn btn-outline-danger" type="submit"><i class="fa fa-close"></i></button>
                                            </form>
                                            {{-- <a href="" class="btn btn-info">View</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="mt-3 d-flex justify-content-center">
                        {{ $series->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection