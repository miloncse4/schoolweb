@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-primary d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Salary Add</b></i></h2>
        <a href="{{ route('salary.view') }}" class="btn btn-sm btn-warning" style="font-weight:bold;">
        <i class="fa fa-bars"></i> List</a>
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
          <form action="{{route('salary.store')}}" method="post" enctype="multipart/form-data">
           @csrf
           <div class="form-row">     

            <div class="col-md-4 form-group">
               <label class="text-dark font-weight-bold">Employee Name <font style="color:red;"><b>*</b></font></label>
               <input type="text" name="name" class="form-control form-control-sm"/>
               @error('name')
               <small class="text-danger">{{$message}}</small>
               @enderror
                </div>

            <div class="col-md-4 form-group">
            <label class="text-dark font-weight-bold">Mobile Number <font style="color:red;"><b>*</b></font></label>
            <input type="text" name="mobile_no" class="form-control form-control-sm"/>
            @error('mobile_no')
            <small class="text-danger">{{$message}}</small>
            @enderror
                </div>

            <div class="col-md-3 form-group">
            <label class="text-dark font-weight-bold">Date<font style="color:red;"><b>*</b></font></label>
            <input type="date" name="date" class="form-control form-control-sm"/>
             @error('date')
            <small class="text-danger">{{$message}}</small>
             @enderror
                </div>

                <div class="col-md-3 form-group">
                <label class="text-dark font-weight-bold">Salary <font style="color:red;"><b>*</b></font></label>
                <input type="text" name="salary" class="form-control form-control-sm"/>
                 @error('salary')
                <small class="text-danger">{{$message}}</small>
                 @enderror
                    </div>                                       
                   
                    </div>
                    <button type="submit" class="btn btn-primary text-light"><i>Submit</i></button>
            </form>
            </table>
        </div>
        </div>
    </div>
     @endsection