@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-warning d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Create Designation</b></i></h2>
        <a href="{{ route('setup.designation.view') }}" class="btn btn-sm btn-dark" style="font-weight:bold;"><i class="fa fa-list"> Show Designation</i></a>
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
          <form action="{{route('setup.designation.store')}}" method="post" id='myform'>
           @csrf
           <div class="form-row">          

            <div class="col-md-8 form-group">
               <label>Designation</label>
               <input type="text" name="name" class="form-control" placeholder="please gave the designation"/>
               @error('name')
               <small class="text-danger">{{$message}}</small>
               @enderror
                </div>

                <div class="col-md-6 form-group">
                   <button type="submit" class="btn btn-warning text-light">Submit</button>
                </div>                    
      </div>
          </form>
        </table>
      </div>
    </div>
  </div>
@endsection