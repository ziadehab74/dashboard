@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">All User</h3>
                          </div>


                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>id</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Gender</th>
                              <th>Status</th>
                              <th>Nationality</th>
                              <th colspan="2" style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @foreach ($all as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                   <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->gender}}</td>
                                    <td>{{$row->status}}</td>
                                    <td>{{$row->nationality}}</td>
                                        <td><a class="nav-link bg-danger"   href="{{URL::to('/block-user/'.$row->id)}}">Block</a></td>
                                        <td><a class="nav-link bg-warning "  href="{{URL::to('/EditUser/'.$row->id)}}" >Edit</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            </tfoot>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
              </section>
        </div>
    </div>
</div>
@endsection
