@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-primary d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Other cost add</b></i></h2>
        <a href="{{ route('othercost.view') }}" class="btn btn-sm btn-warning" style="font-weight:bold;">
        <i class="fa fa-bars"></i> All cost</a>
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
          <form action="{{route('othercost.store')}}" method="post" enctype="multipart/form-data">
           @csrf
           <div class="form-row">     

                <div class="col-md-3 form-group">
                    <label class="text-dark font-weight-bold">Date<font style="color:red;"><b>*</b></font></label>
                    <input type="date" name="date" class="form-control form-control-sm" style="corsour:pointer;"/>
                    @error('date')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                     </div>

             <div class="col-md-3 form-group">
                <label class="text-dark font-weight-bold">Amount <font style="color:red;"><b>*</b></font></label>
                <input type="text" name="amount" class="form-control form-control-sm"/>
                @error('amount')
                <small class="text-danger">{{$message}}</small>
                @enderror
                 </div>

                 <div class="col-md-3 form-group">
                    <label class="text-dark font-weight-bold mb-2">Images</label>
                   <input type="file" class="form-control form-control-sm" name="img" id="img"/>
                   @error('img')
                   <small class="text-danger">{{$message}}</small>
                   @enderror
                     </div>

                     <div class="col-md-3 form-group">
                        <img id="showImg" src="{{ (!empty($cost->img))?asset('uploads/cost_img/'.$cost->img)
                        :asset('uploads/user.png') }}" alt="" style="width:200px;height:110px; border:2px solid #000;">
                    </div> 
                    
                    <div class="col-md-3 form-group">
                        <label class="text-dark font-weight-bold">Description <font style="color:red;"><b>*</b></font></label>
                        <textarea rows="4" name="description" class="form-control"></textarea>
                        @error('description')
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
                                             