@extends('multiauth::layouts.app')
@section('menuUser', 'menu-open')
@section('revActive', 'active')
@section('mainTitle', 'Reviews |')
@section('content')
<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 bg-info">
              <h6 class="m-0 font-weight-bold text-light ">Reviews by Users</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#SL</th>
                      <th>Title</th>
                      <th>Posted By</th>
                      <th>Posted At</th>
                      <th>Clicked</th>
                      <th>Read</th>
                      <th>Delete</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>#SL</th>
                      <th>Title</th>
                      <th>Posted By</th>
                      <th>Posted At</th>
                      <th>Clicked</th>
                      <th>Read</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($reviews as $review)
                      <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{ $review->title }}</td>
                      <td>{{ $review->users[0]->name }}</td>
                      <td>{{$review->created_at->diffForHumans()}}</td>
                      <td>{{$review->counter}}</td>
                      <td><a href="{{ route('read.review',$review->id) }}"><i class="fas fa-glasses ml-3"></i></i>
</a></td>
                      <td><a href="{{ route('destroy.review',$review->id) }}" id="delete"><i class="fa fa-trash text-danger ml-3" aria-hidden="true"></i></a></td>
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