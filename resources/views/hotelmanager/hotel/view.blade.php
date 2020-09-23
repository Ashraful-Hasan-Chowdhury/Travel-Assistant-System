@extends('hotelmanager.layouts.app')
@section('menuHotel', 'menu-open')
@section('viewHotelActive', 'active')
@section('mainTitle', 'View Hotels |')
@section('content')
<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Added Hotels</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                      <th>Hotel Name</th>
                      <th>Lattitude</th>
                      <th>Longitude</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                   
                      <th>Hotel Name</th>
                      <th>Lattitude</th>
                      <th>Longitude</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($hotels as $hotel)
                      @foreach ($hotel->hotelmanagers as $hotelmanager)
                        @if ($hotelmanager->id == auth('hotelmanager')->id())
                          <tr>
                           
                            <td>{{ $hotel->hname }}</td>
                            <td>{{ $hotel->lat }}</td>
                            <td>{{ $hotel->lng }}</td>
                            <td><a href="{{route('edit.hotel',['id'=>$hotel->id])}}"><i class="fas fa-edit ml-3"></i></a></td>
                            <td><a href="{{route('delete.hotel',['id'=>$hotel->id])}}" id="delete"><i class="fas fa-trash-alt ml-3 text-danger"></i></a></td>
                          </tr>
                        @endif
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