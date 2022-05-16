@extends('admin.admin_master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">          
      <div class="card">
        <div class="card-header bg-info d-sm-flex align-items-center justify-content-between">
          <h3 class="card-title text-light"><b><i>All Students Marksheet</i></b></h3>
          <a href="{{ route('home') }}" class="btn btn-light btn-sm"><i class="fa fa-home"></i> Home</a>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success">
          <strong>{{Session::get('success')}}</strong>
        </div>
        @endif
        @if(Session::has('er'))
        <div class="alert alert-danger">
          <strong>{{Session::get('er')}}</strong>
        </div>
        @endif
        <form method="GET" action="{{ route('marksheet.get') }}" id="MyForm" target="__blank">
        @csrf
          <div class="card-body">            
            <div class="form-row">                   
              <div class="form-group col-md-3">
                <label class="text-dark" for="year_id">Select Year</label>
                <select name="year_id" id="year_id" class="form-control select2bs4">
                  <option value="">Select Year</option>
                  @foreach($years as $year)
                      <option value="{{ $year->id }}" {{(@$year_id == $year->id)?"selected":""}}>{{ $year->year }}</option>
                  @endforeach
                </select>
                <font style="color: red"> 
                  {{($errors->has('year_id'))?($errors->first('year_id')):''}} 
                </font>                 
              </div>
              <div class="form-group col-md-3">
                <label class="text-dark" for="class_id">Select Class</label>
                <select name="class_id" id="class_id" class="form-control select2bs4">
                  <option selected value="">Select Class</option>
                  @foreach($classes as $class)
                      <option value="{{ $class->id }}" {{(@$class_id == $class->id)?"selected":""}}>{{ $class->class_name }}</option>
                  @endforeach
                </select>
                <font style="color: red"> 
                  {{($errors->has('class_id'))?($errors->first('class_id')):''}} 
                </font>                 
              </div>

              <div class="form-group col-md-3">
                <label class="text-dark">Exam Type</label>
                <select name="exam_type_id" id="exam_type_id" class="form-control select2bs4">
                  <option value="">Select Exam Type</option>
                  @foreach($exam_types as $type)
                    <option value="{{ $type->id }}">{{ $type->exam }}</option>
                  @endforeach
                </select>
                <font style="color: red"> 
                    {{($errors->has('exam_type_id'))?($errors->first('class_id')):''}} 
                  </font>             
              </div>

              <div class="form-group col-md-3">
                <label class="text-dark">Id no</label>
                <input type="text" name="id_no" class="form-control"/>
                <font style="color: red"> 
                    {{($errors->has('id_no'))?($errors->first('class_id')):''}} 
                  </font> 
              </div>

              <div class="form-group col-md-12">
                <button type="submit" class="btn btn-info"><i>Submit</i></button>            
              </div>
            </div>            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection