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
                          <h3 class="card-title">All Activities</h3>
                          </div>


                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>id</th>
                              <th>Hotel Name</th>
                              <th>Email</th>
                              <th>Facilities</th>
                              <th>Application Documents</th>
                              <th>City</th>


                              <th colspan="2" style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @foreach ($all as $key=>$row)
                                <tr>
                                   <td>{{$key+1}}</td>
                                   <td>{{$row->Hotel_name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->facilities}}</td>
                                    <td>{{$row->application_documents}}</td>
                                    <td>{{$row->name_en}}</td>
                                        <td><a class="nav-link bg-warning" id="button5"  href="{{URL::to('/UpdateBlockedhotel/'.$row->id)}}">Return Hotel</a></td>
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
