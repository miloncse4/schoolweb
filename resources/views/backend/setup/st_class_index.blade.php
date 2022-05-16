@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h2><i>Student Class List</i></h2>
        <a href="{{ route('setup.student.create') }}" 
        class="btn btn-sm btn-primary" style="font-weight: bold;"><i class="fa fa-plus-circle"></i> Class Add</a>
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
                  <td>#</td>
                  <td>Class Name</td>
                  <td>Option</td>
                </tr>
              </thead>
              <tbody>
               @forelse($students as $student)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$student->class_name}}</td>
                  <td>
                    <a href="{{ route('setup.student.edit',$student->id) }}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('setup.student.destroy',$student->id) }}" id="delete" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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