@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-success d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i>Employee Salary Details information</i></h2>
        <a href="{{ route('emplyoee.salary.view') }}" class="btn btn-sm btn-light" style="font-weight:bold;">
        <i class="fa fa-bars"></i> Employee list</a>
      </div>
      <div class="card-body">
        @if(session('InsErr'))
        <div class="alert alert-danger alert-dismissable fade show">
            <strong>{{session('InsErr')}}</strong>
        </div>
        @endif
        @if(session('InsDone'))
        <div class="alert alert-success alert-dismissable fade show">
            <strong>{{session('InsDone')}}</strong>
        </div>
        @endif
        <strong class="text-dark"><i>Employ Name : </i></strong>{{ $details->name }} <br>
        <strong class="text-dark"><i>Employ Id No : </i></strong>{{ $details->id_no }} <br>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><b><i>SL.</i></b></th>
                    <th><b><i>Previous Salary</i></b></th>
                    <th><b><i>Present Salary</i></b></th>
                    <th><b><i>Increment Salary</i></b></th>
                    <th><b><i>Effected Date</i></b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salary_log as $key => $log)
                    <tr>
                        @if($key=="0")
                        <td class="text-center" colspan="5"><strong>Join salary : </strong>{{ $log->previous_salary }}</td>
                        @else
                        <td>{{ $key+1 }}</td>
                        <td>{{ $log->previous_salary }}</td>
                        <td>{{ $log->present_salary }}</td>
                        <td>{{ $log->increment_salary }}</td>
                        <td>{{ date('Y-m-d',strtotime($log->effected_date)) }}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection