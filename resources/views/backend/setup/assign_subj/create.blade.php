@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-success d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Assign subject Add</b></i></h2>
        <a href="{{ route('setup.asign.subject.view') }}" class="btn btn-sm btn-primary" style="font-weight:bold;">
    <i class="fa fa-list"></i> view subject</a>
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
        <form action="{{route('setup.asign.subject.store')}}" method="post">
            @csrf
        <div class="add_item">

            <div class="form_row">
                <div class="col-md-4 form-group">
                 <label>Class Name</label>
                  <select name="class_id" class="form-control">
                    <option value="">Select class</option>
                    @foreach ($classes as $classe)
                        <option value="{{ $classe->id }}">{{ $classe->class_name }}</option>
                    @endforeach
                 </select>
                 @error('class_id')
                 <small class="text-danger">{{$message}}</small>
                 @enderror
                 </div>
                </div> 
                    
            <div class="form-row">
                <div class="col-md-3 form-group">
                    <label>Subject</label>
                    <select name="subject_id" class="form-control">
                        <option value="">Select subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                        @endforeach
                    </select>
                    @error('subject_id')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                     </div>            
        
             <div class="col-md-2 form-group">
                <label>Full Mark</label>
                    <input type="text" class="form-control" name="full_mark">
                    @error('full_mark')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                        </div> 

                        <div class="col-md-2 form-group">
                            <label>Pass Mark</label>
                                <input type="text" class="form-control" name="pass_mark">
                                @error('pass_mark')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                                    </div>

                                    <div class="col-md-2 form-group">
                                        <label>Get Mark</label>
                                            <input type="text" class="form-control" name="get_mark">
                                            @error('get_mark')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                                </div>
                        
                            </div>
                <button type="submit" class="btn btn-success">Submit</button>                 
                </div>     
        </form>
      </div>
    </div>
</div>
@endsection