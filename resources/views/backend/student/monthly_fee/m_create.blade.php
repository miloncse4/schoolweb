@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-primary d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Monthly Fee Add</b></i></h2>
        <a href="{{ route('student.monthly.view') }}" class="btn btn-sm btn-light" style="font-weight:bold;">
    <i class="fa fa-list"></i> view </a>
      </div>
      <div class="card-body">
        @if(session('InsErr'))
        <div class="alert alert-danger alert-dismissable fade show">
            <strong>{{session('InsErr')}}</strong>
        </div>
        @endif
        @if(session('message'))
        <div class="alert alert-success alert-dismissable fade show">
            <strong>{{session('message')}}</strong>
        </div>
        @endif
        <form action="{{route('student.monthly.store')}}" method="post">
            @csrf
        <div class="add_item">

            <div class="col-md-2 form-group">
                <label>Class name</label>
                    <input type="text" class="form-control" name="class_name">
                    @error('class_name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                     </div>
                    
            <div class="form-row">
                <div class="col-md-2 form-group">
                    <label>Fee name</label>
                        <input type="text" class="form-control" name="fee_name">
                        @error('fee_name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                         </div>
        
             <div class="col-md-2 form-group">
                <label>Amount</label>
                    <input type="text" class="form-control" name="amount">
                    @error('amount')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                        </div> 
                        
                            </div>
                <button type="submit" class="btn btn-primary">Submit</button>                 
                </div>     
        </form>
      </div>
    </div>
</div>
@endsection