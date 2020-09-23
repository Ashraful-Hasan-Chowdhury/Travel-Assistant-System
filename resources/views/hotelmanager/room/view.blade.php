@extends('hotelmanager.layouts.app')
@section('menuRoom', 'menu-open')
@section('viewRoomActive', 'active')
@section('mainTitle', 'View Rooms |')
@section('content')
<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Added Rooms</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     
                      <th>Hotel Name</th>
                      <th>Room Id</th>
                      <th>Room Type</th>
                      <th>Cost</th>
                      <th>Quantity</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Hotel Name</th>
                      <th>Room Id</th>
                      <th>Room Type</th>
                      <th>Cost</th>
                      <th>Quantity</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($rooms as $room)
                      @foreach ($room->hotels as $hotel)
                        @foreach ($hotel->hotelmanagers as $hotelmanager)
                        @if ($hotelmanager->id == auth('hotelmanager')->id())
                          <tr>
                            <td>{{ $hotel->hname }}</td>
                            <td>{{ $room->id }}</td>
                            <td>{{ $room->type }}</td>
                            <td>{{ $room->cost }} Taka/Day</td>
                            <td>{{ $room->quantity }}</td>
                            <td><a href="{{route('edit.room',['id'=>$room->id])}}"><i class="fas fa-edit ml-3"></i></a></td>
                            <td><a href="{{route('delete.room',['id'=>$room->id])}}" id="delete"><i class="fas fa-trash-alt ml-3 text-danger"></i></a></td>
                          </tr>
                        @endif
                        @endforeach
                      @endforeach
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

    <!-- Page level custom scripts -->
  <script src="{{ asset('public/admin/js/demo/datatables-demo.js') }}"></script>
@endsection