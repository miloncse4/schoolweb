@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-primary d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><b><i>Edit Subject</i></b></h2>
        <a href="{{ route('setup.subject.view') }}" class="btn btn-sm btn-danger" style="font-weight:bold;">Back</a>
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
          <form action="{{route('setup.subject.update',$sub->id)}}" method="post">
           @csrf
           <div class="form-row">
        
            <div class="col-md-8 form-group">
                <label><b><i>Subject</i></b></label>
                <input type="text" name="subject" class="form-control" value="{{ $sub->subject }}"/>
                @error('subject')
                <small class="text-danger">{{$message}}</small>
                @enderror
                 </div>

                     <div class="col-md-6 form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                     </div>                    
           </div>
          </form>
        </table>
      </div>
    </div>
  </div>
@endsection