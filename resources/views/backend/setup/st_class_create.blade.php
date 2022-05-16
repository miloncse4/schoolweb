@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h2>Create Student Class</h2>
        <a href="{{ route('setup.student.view') }}" class="btn btn-sm btn-info" style="font-weight:bold;">View</a>
      </div>
      <div class="card-body">
        @if(session('InsErr'))
        <div class="alert alert-danger alert-dismissable fade show">
            <strong>{{session('InsErr')}}</strong>
        </div>
        @endif
        @if(session('Done'))
        <div class="alert alert-success alert-dismissable fade show">
            <strong>{{session('Done')}}</strong>
        </div>
        @endif
        <table class="table table-bordered">
          <form action="{{route('setup.student.store')}}" method="post">
           @csrf
           <div class="form-row">
          

                 <div class="col-md-8 form-group">
                    <label for="class_name">Class Name</label>
                    <input type="text" name="class_name" class="form-control"/>
                    @error('class_name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                     </div>

                     <div class="col-md-6 form-group">
                        <button type="submit" class="btn btn-primary">Submit_Class</button>
                     </div>                    
           </div>
          </form>
        </table>
      </div>
    </div>
  </div>
@endsection