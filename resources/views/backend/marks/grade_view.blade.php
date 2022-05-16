@extends('admin.admin_master')
@section('title','Grade view')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-dark d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Grade Point List</b></i></h2>
        <a href="{{ route('marks.grade.add') }}" 
        class="btn btn-sm btn-light" style="font-weight: bold;"><i class="fa fa-plus-circle"></i> Add Grade Point</a>
      </div>
      <div class="card-body">
        @if(Session::has('rong'))
        <div class="alert alert-warning">
          <strong>{{Session::get('rong')}}</strong>
        </div>
        @endif
        @if(Session::has('Done'))
       <div class="alert alert-primary">
         <strong>{{Session::get('Done')}}</strong>
       </div>
       @endif
        <table class="table table-bordered table-striped">
            <thead class="bg-primary text-light">
                <tr>
                  <td width="5%"><b><i>SL.</i></b></td>
                  <td><b><i>Grade Name</i></b></td>
                  <td><b><i>Grade Point</i></b></td>
                  <td><b><i>Start Marks</i></b></td>
                  <td><b><i>End Marks</i></b></td>
                  <td><b><i>Point Range</i></b></td>
                  <td><b><i>Remarks</i></b></td>
                  <td><b><i>Action</i></b></td>
                </tr>
              </thead>
              <tbody>
               @forelse($allData as $data)
                <tr class="{{ $data->id }}">
                  <td>{{$loop->index+1}}</td>
                  <td>{{ $data->grade_name }}</td>
                  <td>{{ number_format((float)$data->grade_point,2) }}</td>
                  <td>{{ $data->start_marks }}</td>
                  <td>{{ $data->end_marks }}</td>
                  <td>{{ number_format((float)$data->grade_point,2) }} - {{ ($data->grade_point == 5)?(number_format((float)$data->grade_point,2)):
                  (number_format((float)$data->grade_point+1,2) - (float)0.01) }}</td>
                  <td>{{ $data->remarks }}</td>
                  <td>
                    <a href="{{ route('marks.grade.edit',$data->id) }}" title="Edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
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