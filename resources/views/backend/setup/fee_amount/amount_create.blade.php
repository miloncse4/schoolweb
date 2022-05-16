@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-success d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Add Fee Amountd</b></i></h2>
        <a href="{{ route('setup.fee.amount.view') }}" class="btn btn-sm btn-primary" style="font-weight:bold;">
    <i class="fa fa-list"></i> Fee amount list</a>
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
        <form action="{{route('setup.fee.amount.store')}}" method="post">
            @csrf
        <div class="add_item">

            <div class="form_row">
                <div class="col-md-4 form-group">
                 <label>Fee Category</label>
                  <select name="fee_category_id" class="form-control">
                    <option value="">Select fee category</option>
                    @foreach ($fee_categories as $category)
                        <option value="{{ $category->id }}">{{ $category->fee_category }}</option>
                    @endforeach
                 </select>
                 @error('fee_category_id')
                 <small class="text-danger">{{$message}}</small>
                 @enderror
                 </div>
                </div> 
                    
            <div class="form-row">
                <div class="col-md-4 form-group">
                    <label>Class</label>
                    <select name="class_id" class="form-control">
                        <option value="">Select class</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                    @error('class_id')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                     </div>            
        
             <div class="col-md-4 form-group">
                <label>Amount</label>
                    <input type="text" class="form-control" name="amount">
                    @error('amount')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                        </div> 
                        <div class="form-group col-md-1" style="padding-top:25px;">
                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                        </div>
                            </div>
                <button type="submit" class="btn btn-success">Submit</button>                 
                </div>     
        </form>
      </div>
    </div>
</div>
@endsection