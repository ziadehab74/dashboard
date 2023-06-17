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
                              <th>Activity Name</th>
                              <th>Categories Name</th>
                              <th>City</th>
                              <th>Total Reviews</th>
                              <th>Rate</th>
                              <th>Hotel Name</th>
                              <th>Activity Price</th>

                              <th colspan="2" style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @foreach ($all as $key=>$row)
                                <tr>
                                   <td>{{$key+1}}</td>
                                   <td>{{$row->activityName}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->city}}</td>
                                    <td>{{$row->total_reviews}}</td>
                                    <td>{{$row->avg_rating}}</td>
                                    <td>{{$row->hotel_name}}</td>
                                    <td>{{$row->activityPrice}}</td>
                                        <td><a class="nav-link bg-danger" id="button5"  href="{{URL::to('/delete-user/'.$row->id)}}"> Block</a></td>
                                        <td><a class="nav-link bg-warning "  href="{{URL::to('/edit_user/'.$row->id)}}" >Edit</a></td>
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
