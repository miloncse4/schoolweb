@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h2 class="text-dark"><i>Student Fee List</i></h2>
        <a href="{{ route('setup.fee.create') }}" 
        class="btn btn-sm btn-danger" style="font-weight: bold;"><i class="fa fa-plus-circle"></i> Add Fee</a>
      </div>
      <div class="card-body">
        @if(Session::has('message'))
       <div class="alert alert-primary">
         <strong>{{Session::get('message')}}</strong>
       </div>
       @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                  <td><b>SL</b></td>
                  <td><b>Student Fee Category</b></td>
                  <td><b>Action</b></td>
                </tr>
              </thead>
              <tbody>
               @forelse($fees as $fee)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$fee->fee_category}}</td>
                  <td>
                    <a href="{{ route('setup.fee.edit',$fee->id) }}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>
                @empty
                <tr>
                    <td class="text-danger text-center" colspan="10">No data available in table</td>
                </tr>
                @endforelse
              </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection