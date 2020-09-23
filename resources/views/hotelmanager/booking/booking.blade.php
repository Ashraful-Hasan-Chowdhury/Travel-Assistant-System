@extends('hotelmanager.layouts.app')
@section('menuRoom', 'menu-open')
@section('bookingActive', 'active')
@section('mainTitle', 'View Rooms |')
@section('content')
<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User Bookings</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     
                      <tr>
                      <th>Hotel Name</th>
                      <th>Room Id</th>
                      <th>User Name</th>
                      <th>User Phone</th>
                      <th>Paid Amount</th>
                      <th>TrxID</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </tr>
                  </thead>
                 
                  <tbody>
                    @foreach ($bookings as $booking)
                    @if ($booking->status != 'canceled')
                    @foreach ($booking->rooms as $room)
                      @foreach ($room->hotels as $hotel)
                        @foreach ($hotel->hotelmanagers as $hotelmanager)
                        @if ($hotelmanager->id == auth('hotelmanager')->id())
                          <tr>
                            <td>{{ $hotel->hname }}</td>
                            <td>{{ $room->id }}</td>
                            <td>{{ $booking->users[0]->name }}</td>
                            <td>{{ $booking->users[0]->phone }}</td>
                            <td>{{ $booking->cost }} Taka</td>
                            <td>{{ $booking->trxid }}</td>
                            <td>{{ $booking->status }}</td>
                            @if ($booking->status=="pending")
                            <td><a href="{{route('confirm.booking.admin',['id'=>$booking->id])}}" class="btn btn-sm btn-success">Confirm</a>
                            <a href="{{route('reject.booking.admin',['id'=>$booking->id])}}" class="btn btn-sm btn-danger" id="delete">Reject</a></td>
                            @else
                            <td>done!</td>
                            @endif
                          </tr>
                        @endif
                        @endforeach
                        @endforeach
                      @endforeach
                      @endif
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