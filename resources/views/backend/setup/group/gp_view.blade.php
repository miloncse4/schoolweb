@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h2><i>Student Group List</i></h2>
        <a href="{{ route('setup.student.group.create') }}" 
        class="btn btn-sm btn-info" style="font-weight: bold;"><i class="fa fa-plus-circle"></i> Add Group</a>
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
                  <td>Group</td>
                  <td>Option</td>
                </tr>
              </thead>
              <tbody>
               @forelse($groups as $group)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$group->group}}</td>
                  <td>
                    <a href="{{ route('setup.student.group.edit',$group->id) }}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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