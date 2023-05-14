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
    Edit User
        </h5>
    </div>
    <div class="card-body">
        <form action="{{URL::to('/update-user/'.$edit->id)}}" method="post">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Enter Your Name" value="{{$edit->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">User Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address" value="{{$edit->email}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Enter Your  password" value="{{$edit->password}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Role Type</label>
                <div class="col-sm-10">
                    <select class="form-control" id="exambleFormControlselect1 " name="role" value="{{$edit->role}}">
                        <option value="Admin" {{'Admin'== $edit->role ? 'selected' : ''}}>Admin</option>
                        <option value="customer" {{'customer'== $edit->role ? 'selected' : ''}}>Customer</option>
                        <option value="Manager" {{'Manager'== $edit->role ? 'selected' : ''}}>Manager</option>
                    </select>
                </div>

            </div>

    </div>
    <div class="card-footer " style="display: flex; justify-content: right; align-items: center">
        <button type="submit" class="btn btn-warning" style="width: 20%">
            Edit
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
