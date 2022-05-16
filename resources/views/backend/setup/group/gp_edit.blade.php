@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h2><i>Edit Group</i></h2>
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
        <table class="table table-bordered">
          <form action="{{route('setup.student.group.update',$group_info->id)}}" method="post">
           @csrf
           <div class="form-row">
          

            <div class="col-md-8 form-group">
               <label for="class_name">Group</label>
               <input type="text" name="group" class="form-control" value="{{ $group_info->group }}"/>
               @error('group')
               <small class="text-danger">{{$message}}</small>
               @enderror
                </div>

                <div class="col-md-6 form-group">
                   <button type="submit" class="btn btn-success">Update</button>
                </div>                    
      </div>
          </form>
        </table>
      </div>
    </div>
  </div>
@endsection