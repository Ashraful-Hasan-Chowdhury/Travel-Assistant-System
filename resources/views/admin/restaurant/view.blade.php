@extends('multiauth::layouts.app')
@section('menuRestaurant', 'menu-open')
@section('viewRestaurant', 'active')
@section('mainTitle', 'View Restaurants |')
@section('content')
<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Added Restaurants</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Restaurant Name</th>
                      <th>Lattitude</th>
                      <th>Longitude</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sl</th>
                      <th>Restaurant Name</th>
                      <th>Lattitude</th>
                      <th>Longitude</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($restaurants as $restaurant)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{ $restaurant->name }}</td>
                      <td>{{ $restaurant->lat }}</td>
                      <td>{{ $restaurant->lng }}</td>
                      <td><a href="{{route('edit.restaurant',['id'=>$restaurant->id])}}"><i class="fas fa-edit ml-3"></i></a></td>
                      <td><a href="{{route('delete.restaurant',['id'=>$restaurant->id])}}" id="delete"><i class="fas fa-trash-alt ml-3 text-danger"></i></a></td>
                    </tr>
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