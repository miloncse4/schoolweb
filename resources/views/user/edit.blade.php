@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-danger d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><b><i>User update</i></b></h2>
        <a href="{{ route('user.view') }}" class="btn btn-sm btn-light" style="font-weight:bold;">View</a>
      </div>
      <div class="card-body">
        @if(session('InsErr'))
        <div class="alert alert-danger alert-dismissable fade show">
            <strong>{{session('InsErr')}}</strong>
        </div>
        @endif
        @if(session('update'))
        <div class="alert alert-success alert-dismissable fade show">
            <strong>{{session('update')}}</strong>
        </div>
        @endif
        <table class="table table-bordered">
          <form action="{{route('user.update',$info->id)}}" method="post" id='myform'>
           @csrf
           <div class="form-row">
            <div class="col-md-4 form-group">
                <label for="role">User Role</label>
                  <select name="role" class="form-control">
                      <option value="">Select Role</option>                      
                      <option value="Admin" {{ ($info->role =="Admin")?"selected":"" }}>Admin</option>
                      <option value="Operator" {{ ($info->role =="Operator")?"selected":"" }}>Operator</option>
                  </select>
                  @error('role')
                  <small class="text-danger">{{$message}}</small>
                  @enderror
                 </div>

                 <div class="col-md-4 form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $info->name }}"/>
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                     </div>

                     <div class="col-md-4 form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $info->email }}"/>
                        @error('email')
                        <small class="text-danger">{{$message}}</small>
                         @enderror
                         </div>

                                 <div class="col-md-6 form-group">
                                    <button type="submit" class="btn btn-danger">Update</button>
                                 </div>  
           </div>
          </form>
        </table>
      </div>
    </div>
  </div>
@endsection