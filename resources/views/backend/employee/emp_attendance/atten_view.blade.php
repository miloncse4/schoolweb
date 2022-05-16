@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-success d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Employee Attendance List</b></i></h2>
        <a href="{{ route('emplyoee.attendance.add') }}" 
        class="btn btn-sm btn-danger" style="font-weight: bold;"><i class="fa fa-plus-circle"></i> Attendance</a>
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
            <thead class="bg-info text-light">
                <tr>
                  <td width="5%"><b><i>SL.</i></b></td>
                  <td width="16%"><b><i>Date</i></b></td>
                  <td width="12%"><b><i>Option</i></b></td>
                </tr>
              </thead>
              <tbody>
               @forelse($allData as $data)
                <tr class="{{ $data->id }}">
                  <td>{{$loop->index+1}}</td>
                  <td>{{date('d-m-Y',strtotime($data->date))}}</td>
                  <td>
                    <a href="{{ route('emplyoee.attendance.edit',$data->date) }}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('emplyoee.attendance.details',$data->date) }}" title="Details" class="btn btn-sm btn-danger"><i class="fa fa-eye"></i></a>
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