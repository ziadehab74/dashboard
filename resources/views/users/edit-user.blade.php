@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
<section class="content">
    <div class="row">
        <div class="col-lg-1">

        </div>
        <div class="col-lg-10">
<div class="card">
    <div class="card-header">
        <h5 class="card-title">
    Add User
        </h5>
    </div>
    <div class="card-body">
        <form action="{{URL::to('/UpdateUser/'.$row->id)}}" method="post">
            <div class="mx-auto">
            @error            ('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Enter User Name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Enter  User Email Address" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Enter User  password" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="gender" placeholder="Enter User  Gender" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="status" placeholder="Enter User  Status" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nationality</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nationality" placeholder="Enter User  Nationality" required>
                </div>
            </div>
    </div>
    <div class="card-footer " style="display: flex; justify-content: right; align-items: center">
        <button type="submit" class="btn btn-info" style="width: 20%">
            submit
        </button>
    </div>
</form>

</div>
        </div>
        <div class="col-lg-1">

        </div>
    </div>
    </section>
</div>
    @endsection
