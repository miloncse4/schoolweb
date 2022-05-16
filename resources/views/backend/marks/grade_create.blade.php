@extends('admin.admin_master')
@section('title','Grade create')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-info d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Add Grade Point</b></i></h2>
        <a href="{{ route('marks.grade.index') }}" class="btn btn-sm btn-dark" style="font-weight:bold;">
        <i class="fa fa-bars"></i> View Grade point</a>
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
          <form action="{{route('marks.grade.store')}}" method="post">
           @csrf
            <div class="form-group col-md-4">
                <label class="control-leabel text-dark">Grade name</label>
                <input type="text" name="grade_name" class="form-control form-control-sm"/>
                @error('grade_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label class="control-leabel text-dark">Grade point</label>
                <input type="text" name="grade_point" class="form-control form-control-sm"/>
                @error('grade_point')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label class="control-leabel text-dark">Start marks</label>
                <input type="text" name="start_marks" class="form-control form-control-sm"/>
                @error('start_marks')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label class="control-leabel text-dark">End marks</label>
                <input type="text" name="end_marks" class="form-control form-control-sm"/>
                @error('end_marks')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label class="control-leabel text-dark">Start point</label>
                <input type="text" name="start_point" class="form-control form-control-sm"/>
                @error('start_point')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label class="control-leabel text-dark">End point</label>
                <input type="text" name="end_point" class="form-control form-control-sm"/>
                @error('end_point')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label class="control-leabel text-dark">Remarks</label>
                <input type="text" name="remarks" class="form-control form-control-sm"/>
                @error('remarks')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn-info btn-sm mt-4"><b><i>Submit</i></b></button>
          </form>
        </table>
      </div>
    </div>
  </div>
@endsection