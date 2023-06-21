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
                              <th>user name</th>
                              <th>Hotel name</th>
                              <th>no of nights</th>
                              <th>no of gustes</th>
                              <th>total price</th>
                              <th>check in</th>
                              <th>check out</th>
                              <th>status</th>
                              <th>payment_status</th>
                              <th>payment_method</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @foreach ($all as $key=>$row)
                                <tr>
                                   <td>{{$key+1}}</td>
                                   <td>{{$row->name}}</td>
                                   <td>{{$row->Hotel_name}}</td>
                                   <td>{{$row->num_of_nights}}</td>
                                    <td>{{$row->num_of_guests}}</td>
                                    <td>{{$row->total_price}}</td>
                                    <td>{{$row->check_in}}</td>
                                    <td>{{$row->check_out}}</td>
                                    <td>{{$row->status}}</td>
                                    <td>{{$row->payment_status}}</td>
                                    <td>{{$row->payment_method}}</td>
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
