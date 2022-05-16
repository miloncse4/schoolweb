@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-dark d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Employee Leave List</b></i></h2>
        <a href="{{ route('emplyoee.leave.add') }}" 
        class="btn btn-sm btn-danger" style="font-weight: bold;"><i class="fa fa-plus-circle"></i> Add Leave</a>
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
        <table class="table table-bordered">
            <thead class="bg-primary text-light">
                <tr>
                  <td width="5%"><b><i>SL.</i></b></td>
                  <td><b><i>Name</i></b></td>
                  <td width="18%"><b><i>E-mail</i></b></td>
                  <td width="10%"><b><i>Id No</i></b></td>
                  <td width="16%"><b><i>Purpose</i></b></td>
                  <td width="12%"><b><i>Date</i></b></td>
                  <td width="12%"><b><i>Option</i></b></td>
                </tr>
              </thead>
              <tbody>
               @forelse($allData as $data)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$data['user']['name']}}</td>
                  <td>{{$data['user']['email']}}</td>
                  <td>{{$data['user']['id_no']}}</td>
                  <td>{{$data['purpose']['name']}}</td>
                  <td>
                    {{date('d-m-Y',strtotime($data->start_date))}} To 
                    {{date('d-m-Y',strtotime($data->end_date))}}
                  </td>
                  <td>
                    <a href="{{ route('emplyoee.leave.edit',$data->id) }}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('emplyoee.leave.delete',$data->id) }}" id="delete" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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