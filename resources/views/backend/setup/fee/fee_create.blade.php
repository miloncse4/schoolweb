@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h2><i>Add Fee</i></h2>
        <a href="{{ route('setup.fee.view') }}" class="btn btn-sm btn-primary" style="font-weight:bold;">Fee Category</a>
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
          <form action="{{route('setup.fee.store')}}" method="post" >
           @csrf
           <div class="form-row">
          

            <div class="col-md-8 form-group">
               <label for="class_name">Fee Category</label>
               <input type="text" name="fee_category" class="form-control"/>
               @error('fee_category')
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