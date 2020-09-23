@extends('multiauth::layouts.app')
@section('viewTicketCounter', 'active')
@section('menuTicketCounter', 'menu-open')
@section('mainTitle', 'View Ticketcounters |')
@section('content')
<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Added Ticketcounters</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Ticketcounter Name</th>
                      <th>Type</th>
                      <th>Phone</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sl</th>
                      <th>Ticketcounter Name</th>
                      <th>Type</th>
                      <th>Phone</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($ticketcounters as $ticketcounter)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{ $ticketcounter->name }}</td>
                      <td>{{ $ticketcounter->type }}</td>
                      <td>{{ $ticketcounter->phone }}</td>
                      <td><a href="{{route('edit.ticketcounter',['id'=>$ticketcounter->id])}}"><i class="fas fa-edit ml-3"></i></a></td>
                      <td><a href="{{route('delete.ticketcounter',['id'=>$ticketcounter->id])}}" id="delete"><i class="fas fa-trash-alt ml-3 text-danger"></i></a></td>
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