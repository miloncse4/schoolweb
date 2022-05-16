@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h2><i>Add Year</i></h2>
        <a href="{{ route('setup.student.year.view') }}" class="btn btn-sm btn-primary" style="font-weight:bold;">Show Year</a>
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
          <form action="{{route('setup.student.year.store')}}" method="post" id='myform'>
           @csrf
           <div class="form-row">
          

            <div class="col-md-8 form-group">
               <label for="class_name">Year/Session</label>
               <input type="text" name="year" class="form-control"/>
               @error('year')
               <small class="text-danger">{{$message}}</small>
               @enderror
                </div>

                <div class="col-md-6 form-group">
                   <button type="submit" class="btn btn-primary">Submit_year</button>
                </div>                    
      </div>
          </form>
        </table>
      </div>
    </div>
  </div>
@endsection