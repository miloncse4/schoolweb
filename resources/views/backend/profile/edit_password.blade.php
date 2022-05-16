@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-primary d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><b>Edit Password</b></h2>
      </div>
      <div class="card-body">
        @if(session('error'))
        <div class="alert alert-danger alert-dismissable fade show">
            <strong>{{session('error')}}</strong>
        </div>
        @endif
        @if(session('InsDone'))
        <div class="alert alert-success alert-dismissable fade show">
            <strong>{{session('InsDone')}}</strong>
        </div>
        @endif
        <table class="table table-bordered">
          <form action="{{ route('profile.change') }}" method="post">
           @csrf
           <div class="form-row">

            <div class="col-md-4 form-group">
                <label class="text-dark" for="current_password">Current Password</label>
                <input type="password" name="current_password" class="form-control" id="current_password"/>
                @error('current_password')
                <small class="text-danger">{{$message}}</small>
                @enderror
                 </div>

            <div class="col-md-4 form-group">
                <label class="text-dark" for="new_password">New Password</label>
                <input type="password" name="new_password" class="form-control" id="new_password"/>
                @error('new_password')
                <small class="text-danger">{{$message}}</small>
                @enderror
                 </div>

                 <div class="col-md-4 form-group">
                    <label class="text-dark" for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password"/>
                    @error('confirm_password')
                    <small class="text-danger">{{$message}}</small>
                     @enderror
                     </div>

                     <div class="col-md-6 form-group">
                      <strong class="text-danger">Password strong mustbe Number,Letter & Special cheracter</strong>
                        <button type="submit" class="btn btn-primary mt-2">Change Password</button>
                     </div>  

           </div>
          </form>
        </table>
      </div>
    </div>
  </div>
@endsection