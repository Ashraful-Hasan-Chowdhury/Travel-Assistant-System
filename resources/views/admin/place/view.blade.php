@extends('multiauth::layouts.app')
@section('menuPlace', 'menu-open')
@section('viewActive', 'active')
@section('mainTitle', 'View Places |')
@section('content')
<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Added Places</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Place Name</th>
                      <th>Lattitude</th>
                      <th>Longitude</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sl</th>
                      <th>Place Name</th>
                      <th>Lattitude</th>
                      <th>Longitude</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($places as $place)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{ $place->pname }}</td>
                      <td>{{ $place->lat }}</td>
                      <td>{{ $place->lng }}</td>
                      <td><a href="{{route('edit.place',['id'=>$place->id])}}"><i class="fas fa-edit ml-3"></i></a></td>
                      <td><a href="{{route('delete.place',['id'=>$place->id])}}" id="delete"><i class="fas fa-trash-alt ml-3 text-danger"></i></a></td>
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