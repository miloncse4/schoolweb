@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-danger d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Edit Registration Fee</b></i></h2>
        <a href="{{ route('student.regist.fee.view') }}" class="btn btn-sm btn-dark" style="font-weight:bold;">
      Back </a>
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
        <form action="{{route('student.regist.update',$info->id)}}" method="post">
            @csrf
        <div class="add_item">

            <div class="col-md-2 form-group">
                <label class="text-dark">Class name</label>
                    <input type="text" class="form-control" name="class_name" value="{{ $info->class_name }}">
                    @error('class_name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                     </div>
                    
            <div class="form-row">
                <div class="col-md-2 form-group">
                    <label class="text-dark">Fee name</label>
                        <input type="text" class="form-control" name="fee_name" value="{{ $info->fee_name }}">
                        @error('fee_name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                         </div>
        
             <div class="col-md-2 form-group">
                <label class="text-dark">Amount</label>
                    <input type="text" class="form-control" name="amount" value="{{ $info->amount }}">
                    @error('amount')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                        </div> 

                        <div class="col-md-2 form-group">
                            <label class="text-dark">Discount</label>
                                <input type="text" class="form-control" name="discount" value="{{ $info->discount }}">
                                @error('discount')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                                    </div>
                        
                            </div>
                <button type="submit" class="btn btn-danger">Update</button>                 
                </div>     
        </form>
      </div>
    </div>
</div>
@endsection