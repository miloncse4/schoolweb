@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-primary d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Employee Add</b></i></h2>
        <a href="{{ route('emplyoee.reg.index') }}" class="btn btn-sm btn-warning" style="font-weight:bold;">
        <i class="fa fa-bars"></i> All Employee</a>
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
          <form action="{{route('emplyoee.reg.store')}}" method="post" enctype="multipart/form-data">
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
                    <label class="text-dark font-weight-bold">E-mail <font style="color:red;"><b>*</b></font></label>
                    <input type="text" name="email" class="form-control form-control-sm"/>
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                     </div>

                <div class="col-md-4 form-group">
                    <label class="text-dark font-weight-bold">Father's Name <font style="color:red;"><b>*</b></font></label>
                    <input type="text" name="fname" class="form-control form-control-sm"/>
                    @error('fname')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                     </div>

                     <div class="col-md-4 form-group">
                        <label class="text-dark font-weight-bold">Mother's Name <font style="color:red;"><b>*</b></font></label>
                        <input type="text" name="mname" class="form-control form-control-sm"/>
                        @error('mname')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                         </div>

                         <div class="col-md-4 form-group">
                            <label class="text-dark font-weight-bold">Mobile Number <font style="color:red;"><b>*</b></font></label>
                            <input type="text" name="mobile" class="form-control form-control-sm"/>
                            @error('mobile')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                             </div>

                             <div class="col-md-4 form-group">
                                <label class="text-dark font-weight-bold">Address <font style="color:red;"><b>*</b></font></label>
                                <input type="text" name="address" class="form-control form-control-sm"/>
                                @error('address')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                                 </div>

                             <div class="col-md-3 form-group">
                                <label class="text-dark font-weight-bold">Gander <font style="color:red;"><b>*</b></font></label>
                                <select name="gander" class="form-control form-control-sm">
                                    <option value="">Select Gander</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gander')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                                 </div>

                                 <div class="col-md-3 form-group">
                                    <label class="text-dark font-weight-bold">Religion <font style="color:red;"><b>*</b></font></label>
                                    <select name="religion" class="form-control form-control-sm">
                                        <option value="">Select Religion</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Khristan">Khristan</option>
                                    </select>
                                    @error('religion')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                     </div>

                                     <div class="col-md-3 form-group">
                                        <label class="text-dark font-weight-bold">Date of Birth <font style="color:red;"><b>*</b></font></label>
                                        <input type="date" name="dob" class="form-control form-control-sm"/>
                                        @error('dob')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                         </div>

                                         <div class="col-md-3 form-group">
                                            <label class="text-dark font-weight-bold">Designation <font style="color:red;"><b>*</b></font></label>
                                            <select name="designation_id" class="form-control form-control-sm">
                                                <option value="">Select Designation</option>
                                               @foreach ($designation as $des)
                                                   <option value="{{ $des->id }}">{{ $des->name }}</option>
                                               @endforeach
                                            </select>
                                            @error('designation_id')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                             </div> 
                                             
                                             <div class="col-md-3 form-group">
                                                <label class="text-dark font-weight-bold">Join Date <font style="color:red;"><b>*</b></font></label>
                                                <input type="date" name="join_date" class="form-control form-control-sm"/>
                                                @error('join_date')
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
                                             <div class="col-md-3 form-group">
                                                <label class="text-dark font-weight-bold mb-2">Images</label>
                                               <input type="file" class="form-control form-control-sm" name="img" id="img"/>
                                               @error('img')
                                               <small class="text-danger">{{$message}}</small>
                                               @enderror
                                                 </div>

                                                 <div class="col-md-3 form-group">
                                                    <img id="showImg" src="{{ (!empty($user->img))?asset('uploads/employee_images/'.$user->img)
                                                    :asset('uploads/user.png') }}" alt="" style="width:100px;height:110px; border:2px solid #000;">
                                                </div>                                         
                   
                                                </div>
                                                <button type="submit" class="btn btn-primary text-light"><i>Submit</i></button>
                                                    </form>
                                                    </table>
                                                </div>
                                                </div>
                                            </div>
                                            @endsection