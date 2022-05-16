@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h2>Manage Profile</h2>
        <a href="{{ route('profile.add') }}" class="btn btn-sm btn-warning" style="font-weight:bold;">Your Profile</a>
      </div>
      <div class="card-body">
        @if(session('InsErr'))
        <div class="alert alert-danger alert-dismissable fade show">
            <strong>{{session('InsErr')}}</strong>
        </div>
        @endif
        @if(session('update'))
        <div class="alert alert-success alert-dismissable fade show">
            <strong>{{session('update')}}</strong>
        </div>
        @endif
        <table class="table table-bordered">
          <form action="{{route('profile.update',$editData->id)}}" method="post" id='myform' enctype="multipart/form-data">
           @csrf
           <div class="form-row">

                 <div class="col-md-4 form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $editData->name }}"/>
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                     </div>

                     <div class="col-md-4 form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $editData->email }}"/>
                        @error('email')
                        <small class="text-danger">{{$message}}</small>
                         @enderror
                         </div>

                         <div class="col-md-4 form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" name="mobile" class="form-control" value="{{ $editData->mobile }}"/>
                            @error('mobile')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                             </div>

                             
                 <div class="col-md-4 form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $editData->address }}"/>
                    @error('address')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                     </div>

                     <div class="col-md-4 form-group">
                        <label for="gander">Gender</label>
                          <select name="gander" class="form-control">
                              <option value="">Select Gender</option>                      
                              <option value="Male" {{ ($editData->gander =="Male")?"selected":"" }}>Male</option>
                              <option value="Female" {{ ($editData->gander =="Female")?"selected":"" }}>Female</option>
                          </select>
                          @error('gander')
                          <small class="text-danger">{{$message}}</small>
                          @enderror
                         </div>

                         <div class="col-md-4 form-group">
                             <label for="img">Images</label>
                             <input type="file" class="form-control" name="img" id="img">
                         </div>

                         <div class="col-md-2 form-group">
                            <img id="showImg" src="{{ (!empty($editData->img))?asset('uploads/user_img/'.$editData->img)
                            :asset('uploads/user.png') }}" alt="" style="width:150px;height:160px; border:2px solid #000;">
                        </div>

                                 <div class="col-md-6 form-group" style="padding-top: 30px;">
                                    <button type="submit" class="btn btn-success">Update</button>
                                 </div>  
           </div>
          </form>
        </table>
      </div>
    </div>
  </div>
@endsection