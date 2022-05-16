@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-primary d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><b><i>User Create</i></b></h2>
        <a href="{{ route('user.view') }}" class="btn btn-sm btn-warning" style="font-weight:bold;">Back</a>
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
          <form action="{{route('user.store')}}" method="post" id='myform'>
           @csrf
           <div class="form-row">
            <div class="col-md-4 form-group">
                <label for="role">User Role</label>
                  <select name="role" class="form-control">
                      <option value="">Select Role</option>                      
                      <option value="Admin">Admin</option>
                      <option value="Operator">Operator</option>
                  </select>
                  @error('role')
                  <small class="text-danger">{{$message}}</small>
                  @enderror
                 </div>

                 <div class="col-md-4 form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control"/>
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                     </div>

                     <div class="col-md-4 form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control"/>
                        @error('email')
                        <small class="text-danger">{{$message}}</small>
                         @enderror
                         </div>
                        
               <div class="col-md-6 form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>  
           </div>
          </form>
        </table>
      </div>
    </div>
  </div>
@endsection