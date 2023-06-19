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
    Add Hotel
        </h5>
    </div>
    <div class="card-body">
        <form action="{{URL::to('/Inserthotel')}}" method="post">
            <div class="mx-auto">
            @error            ('Hotel_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
            @csrf
            <div class="form-group row">
                <label for="Hotel_name" class="col-sm-2 col-form-label">Hotel Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Hotel_name" placeholder="Enter Hotel name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="owner_name" class="col-sm-2 col-form-label">Owner Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="owner_name" placeholder="Enter owner name" required>
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
                <label for="name" class="col-sm-2 col-form-label">facilities</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="facilities" placeholder="Enter hotel  facilities" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">application documents</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="application_documents" placeholder="Enter hotel  application documents" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="city_id" class="col-sm-2 col-form-label">city</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="city_id" placeholder="Enter hotel  city" required>
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
