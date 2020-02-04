@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('owner.index') }}" class="btn btn-secondary mb-3"><i class="fa fa-arrow-circle-left"></i> Go Back</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <p class="lead m-0"><i class="fas fa-plus-square"></i></span> New Owner</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('owner.store') }}" method="POST">
                            @csrf
                            <div class="row">
                            <div class="form-group col-md-6">
                                <label for="lastname"><strong>Last Name</strong></label>
                                <input type="text" class="form-control" placeholder="Last Name" name="lastname">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname"><strong>First Name</strong></label>
                                <input type="text" class="form-control" placeholder="First Name" name="firstname">
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="address"><strong>Address</strong></label>
                                <input type="text" class="form-control" placeholder="Address" name="address">
                            </div>
                            <div class="row">
                            <div class="form-group col-md-6">
                                <label for="contact_no"><strong>Contact Number</strong></label>
                                <input type="text" class="form-control" placeholder="Contact Number" name="contact_no">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="license_no"><strong>License Number</strong></label>
                                <input type="text" class="form-control" placeholder="License Number" name="license_no">
                            </div>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Save">
                        </form>
                    </div>
                </div>
            </div>
@endsection