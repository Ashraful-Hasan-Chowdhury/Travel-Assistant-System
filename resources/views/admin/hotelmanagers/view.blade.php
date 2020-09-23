@extends('multiauth::layouts.app')
@section('menuHotel', 'menu-open')
@section('viewHotelActive', 'active')
@section('mainTitle', 'View Hotels |')
@section('content')
<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Not Approved Hotel Managers</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($manager as $manager)
                    @if($manager->approve == null)
                    <tr>
                      <td>{{ $manager->name }}</td>
                      <td>{{ $manager->email }}</td>
                      <td>{{ $manager->mobile }}</td>
                      <td><a href="{{ route('single.manager',$manager->id) }}" class="btn btn-md btn-success">view details</a></td>
                    </tr>
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