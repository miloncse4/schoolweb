@extends('admin.admin_master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">          
      <div class="card">
        <div class="card-header bg-primary d-sm-flex align-items-center justify-content-between">
          <h3 class="card-title text-light"><b><i>Employee Attendance Report</i></b></h3>
          <a href="{{ route('home') }}" class="btn btn-light btn-sm"><i class="fa fa-home"></i> Home</a>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success">
          <strong>{{Session::get('success')}}</strong>
        </div>
        @endif
        @if(Session::has('danger'))
        <div class="alert alert-danger">
          <strong>{{Session::get('danger')}}</strong>
        </div>
        @endif
        <form method="GET" action="{{ route('attendance.get') }}" id="MyForm" target="__blank">
        @csrf
          <div class="card-body">            
            <div class="form-row">

                <div class="form-group col-md-3">
                    <label class="text-dark">Employee name</label>
                    <select name="name" class="form-control select2bs4">
                      <option value="">Select Employee</option>
                      @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                      @endforeach
                    </select>  
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror         
                  </div>                   

              <div class="form-group col-md-3">
                <label class="text-dark">Date</label>
              <input type="date" name="date" class="form-control" style="cursor:pointer;"/>  
                     @error('date')
                    <small class="text-danger">{{$message}}</small>
                    @enderror           
              </div>
         
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-sm btn-primary mt-4"><i>Search</i></button>            
              </div>
            </div>            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection