@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-primary d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i>Employee Salary Increment</i></h2>
        <a href="{{ route('emplyoee.salary.view') }}" class="btn btn-sm btn-light" style="font-weight:bold;">
        <i class="fa fa-bars"></i> Employee list</a>
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
          <form action="{{route('emplyoee.salary.store',$users->id)}}" method="post">
           @csrf
           <div class="form-row">
          
            <div class="col-md-4 form-group">
               <label class="text-dark"><i><b>Salary Amount</b></i></label>
               <input type="text" name="increment_salary" class="form-control"/>
               @error('increment_salary')
               <small class="text-danger">{{$message}}</small>
               @enderror
                </div>

                <div class="col-md-4 form-group">
                    <label class="text-dark"><i><b>Effected Date</b></i></label>
                    <input type="date" name="effected_date" class="form-control"/>
                    @error('effected_date')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                     </div>

                     <div class="col-md-4 form-group">
                        <img id="showImg" src="{{ (!empty($users->img))?asset('uploads/employee_images/'.$users->img)
                        :asset('uploads/user.png') }}" alt="" style="width:100px;height:110px; border:2px solid #000;">
                    </div>

                <div class="col-md-6 form-group">
                   <button type="submit" class="btn btn-primary"><i>Submit</i></button>
                </div>                    
      </div>
          </form>
        </table>
      </div>
    </div>
  </div>
@endsection