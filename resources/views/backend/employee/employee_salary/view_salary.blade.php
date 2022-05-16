@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-warning d-sm-flex align-items-center justify-content-between">
        <h2 class="text-dark"><i><b>Employee Salary List</b></i></h2>
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
            <thead class="bg-dark text-light">
                <tr>
                  <td width="2%"><b><i>SL.</i></b></td>
                  <td width="15%"><b><i>Name</i></b></td>
                  <td><b><i>E-mail</i></b></td>
                  <td><b><i>Mobile No</i></b></td>
                  <td width="4%"><b><i>Address</i></b></td>
                  <td><b><i>Gander</i></b></td>
                  <td><b><i>Join Date</i></b></td>
                  <td><b><i>Salary</i></b></td>
                  <td width="15%"><b><i>Option</i></b></td>
                </tr>
              </thead>
              <tbody>
               @forelse($allData as $data)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->mobile}}</td>
                  <td>{{$data->address}}</td>
                  <td>{{$data->gander}}</td>
                  <td>{{date('d-m-Y',strtotime($data->join_date))}}</td>
                  <td>{{$data->salary}}</td>
                  <td>
                    <a href="{{ route('emplyoee.salary.increment',$data->id) }}" title="Salary Increment" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i></a>
                    <a href="{{ route('emplyoee.salary.details',$data->id) }}"  title="Salary View" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('emplyoee.salary.pay',$data->id) }}" target="_blank"  title="Pay" class="btn btn-sm btn-danger"><i>Pay slip</i></a>
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