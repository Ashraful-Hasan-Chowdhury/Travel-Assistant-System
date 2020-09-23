@extends('hotelmanager.layouts.app')
@section('menuRoom', 'menu-open')
@section('cbActive', 'active')
@section('mainTitle', 'View Rooms |')
@section('content')
<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Cancelled User Bookings</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <h5 class="text-center text-danger">** Pay 90% of user's paid amount to the user and provide the trxid.</h5>
                  <thead>
                    <tr>
                     
                      <th>User Name</th>
                      <th>User Phone</th>
                      <th>Paid Amount (user)</th>
                      <th>TrxID (user)</th>
                      <th>TrxID (your)</th>
                      <th>Confirm</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    @foreach ($bookings as $booking)
                    @if (($booking->status == 'canceled' && $booking->trx_manager=='') || ($booking->status == 'canceled' && $booking->trx_manager==null))
                    @foreach ($booking->rooms as $room)
                      @foreach ($room->hotels as $hotel)
                        @foreach ($hotel->hotelmanagers as $hotelmanager)
                        @if ($hotelmanager->id == auth('hotelmanager')->id())
                          <tr>
                            <td>{{ $booking->users[0]->name }}</td>
                            <td>{{ $booking->users[0]->phone }}</td>
                            <td>{{ $booking->cost }} Taka</td>
                            <td>{{ $booking->trxid }}</td>
                            <td>
                              <form action="{{route('confirm.cancel')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $booking->id }}">
                              <input name="trx_manager{{ $booking->id }}" type="text" class="form-control"/>
                            </td>
                            <td>
                              <button type="submit" class="btn btn-success">confirm</button></form>
                            </td>
                              
                            
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