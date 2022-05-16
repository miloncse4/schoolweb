@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h2><i>Student Year List</i></h2>
        <a href="{{ route('setup.student.year.create') }}" 
        class="btn btn-sm btn-success" style="font-weight: bold;"><i class="fa fa-plus-circle"></i> Add Year</a>
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
                  <td>SL</td>
                  <td>Year/Session</td>
                  <td>Option</td>
                </tr>
              </thead>
              <tbody>
               @forelse($years as $year)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$year->year}}</td>
                  <td>
                    <a href="{{ route('setup.student.year.edit',$year->id) }}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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