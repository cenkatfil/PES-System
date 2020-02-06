@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <a href="{{ route('manufacturer.index') }}" class="btn btn-secondary mb-3"><i class="fa fa-arrow-circle-left"></i> Go Back</a> --}}
        <h2 class="mb-3"><span><i class="fas fa-car"></i></span> Body Type</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <p class="lead m-0"><span><i class="fa fa-edit"></i></span> Update Body Type</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('body.update', $body->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name"><strong>Name</strong></label>
                                <input type="text" class="form-control" placeholder="Body Type Name" name="name" value="{{ $body->name }}">
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
                            <li class="breadcrumb-item lead"><a href="#"><i class="far fa-folder-open"></i> Manage</a></li>
                            <li class="breadcrumb-item lead" aria-current="page"><i class="fas fa-car"></i> Body</li>
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
                                @foreach ($bodies as $body)
                                    <tr>
                                        <td>{{ $body->name }}</td>
                                        <td>
                                            <a href="{{ route('body.edit', $body->id) }}" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                            <form class="d-inline" action="{{ route('body.destroy', $body->id) }}" method="POST">
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
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $bodies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection