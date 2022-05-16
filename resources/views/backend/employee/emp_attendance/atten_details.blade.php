@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-dark d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Employee Attendance Details</b></i></h2>
        <a href="{{ route('emplyoee.attendance.view') }}" 
        class="btn btn-sm btn-danger" style="font-weight: bold;"><i class="fa fa-bars"></i> Employee Attendance List</a>
      </div>
      <div class="card-body">
        @if(Session::has('rong'))
        <div class="alert alert-danger">
          <strong>{{Session::get('rong')}}</strong>
        </div>
        @endif
        @if(Session::has('Done'))
       <div class="alert alert-primary">
         <strong>{{Session::get('Done')}}</strong>
       </div>
       @endif
       <table class="table table-bordered table-striped">
        <thead class="bg-danger text-light">
            <tr>
              <td width="5%"><b><i>SL.</i></b></td>
              <td><b><i>Name</i></b></td>
              <td width="15%"><b><i>Id No</i></b></td>
              <td width="16%"><b><i>Date</i></b></td>
              <td width="15%"><b><i>Attendance status</i></b></td>
            </tr>
          </thead>
          <tbody>
           @forelse($details as $data)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$data['user']['name']}}</td>
              <td>{{$data['user']['id_no']}}</td>
              <td>{{date('d-m-Y',strtotime($data->date))}}</td>
              <td>{{$data->attend_status}}</td>
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