@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-danger d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Employee Salary List</b></i></h2>
        <a href="{{ route('salary.add') }}" class="btn btn-light btn-sm"><i class="fa fa-plus-circle"></i> Salary Entry</a>
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
            <thead class="bg-success text-light">
                <tr>
                  <td width="5%"><b><i>SL.</i></b></td>
                  <td><b><i>Name</i></b></td>
                  <td><b><i>Mobile No</i></b></td>
                  <td><b><i>Date</i></b></td>
                  <td><b><i>Salary</i></b></td>
                  <td><b><i>Option</i></b></td>
                </tr>
              </thead>
              <tbody>
               @forelse($allData as $data)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->mobile_no}}</td>
                  <td>{{date('d-m-Y',strtotime($data->date))}}</td>
                  <td>{{$data->salary}}</td>
                  <td>
                    <a href="{{ route('salary.edit',$data->id) }}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('salary.delete',$data->id) }}" id="delete" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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