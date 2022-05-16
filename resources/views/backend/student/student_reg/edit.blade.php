@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-primary d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Edit Student</b></i></h2>
        <a href="{{ route('student.reg.view') }}" class="btn btn-sm btn-danger" style="font-weight:bold;">
        <i class="fa fa-bars"></i> Back</a>
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
          <form action="{{route('student.reg.update',$editData->student_id)}}" method="post" enctype="multipart/form-data">
           @csrf
           <input type="hidden" name="id" value="{{ @$editData->id }}"/>
           <div class="form-row">     

            <div class="col-md-4 form-group">
               <label class="text-dark font-weight-bold">Student Name <font style="color:red;"><b>*</b></font></label>
               <input type="text" name="name" value="{{ $editData['student']['name'] }}" class="form-control form-control-sm"/>
               @error('name')
               <small class="text-danger">{{$message}}</small>
               @enderror
                </div>

                <div class="col-md-4 form-group">
                    <label class="text-dark font-weight-bold">Father's Name <font style="color:red;"><b>*</b></font></label>
                    <input type="text" name="fname" value="{{ $editData['student']['fname'] }}" class="form-control form-control-sm"/>
                    @error('fname')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                     </div>

                     <div class="col-md-4 form-group">
                        <label class="text-dark font-weight-bold">Mother's Name <font style="color:red;"><b>*</b></font></label>
                        <input type="text" name="mname" value="{{ $editData['student']['mname'] }}" class="form-control form-control-sm"/>
                        @error('mname')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                         </div>

                         <div class="col-md-4 form-group">
                            <label class="text-dark font-weight-bold">Mobile Number <font style="color:red;"><b>*</b></font></label>
                            <input type="text" name="mobile" value="{{ $editData['student']['mobile'] }}" class="form-control form-control-sm"/>
                            @error('mobile')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                             </div>

                             <div class="col-md-4 form-group">
                                <label class="text-dark font-weight-bold">Address <font style="color:red;"><b>*</b></font></label>
                                <input type="text" name="address" value="{{ $editData['student']['address'] }}" class="form-control form-control-sm"/>
                                @error('address')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                                 </div>

                             <div class="col-md-4 form-group">
                                <label class="text-dark font-weight-bold">Gander <font style="color:red;"><b>*</b></font></label>
                                <select name="gander" class="form-control form-control-sm">
                                    <option value="">Select Gander</option>
                                    <option value="Male" {{ (@$editData['student']['gander']=='Male')?'selected':'' }}>Male</option>
                                    <option value="Female" {{ (@$editData['student']['gander']=='Female')?'selected':'' }}>Female</option>
                                </select>
                                @error('gander')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                                 </div>

                                 <div class="col-md-4 form-group">
                                    <label class="text-dark font-weight-bold">Religion <font style="color:red;"><b>*</b></font></label>
                                    <select name="religion" class="form-control form-control-sm">
                                        <option value="">Select Religion</option>
                                        <option value="Islam" {{ (@$editData['student']['religion']=='Islam')?'selected':'' }}>Islam</option>
                                        <option value="Hindu" {{ (@$editData['student']['religion']=='Hindu')?'selected':'' }}>Hindu</option>
                                        <option value="Khristan" {{ (@$editData['student']['religion']=='Khristan')?'selected':'' }}>Khristan</option>
                                    </select>
                                    @error('religion')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                     </div>

                                     <div class="col-md-4 form-group">
                                        <label class="text-dark font-weight-bold">Date of Birth <font style="color:red;"><b>*</b></font></label>
                                        <input type="date" name="dob" value="{{ $editData['student']['dob'] }}" class="form-control form-control-sm"/>
                                        @error('dob')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                         </div>

                                         <div class="col-md-4 form-group">
                                            <label class="text-dark font-weight-bold">Roll <font style="color:red;"><b>*</b></font></label>
                                            <input type="text" name="roll" value="{{ $editData->roll }}" class="form-control form-control-sm" placeholder="Optional"/>
                                            @error('roll')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                             </div>

                                         <div class="col-md-4 form-group">
                                            <label class="text-dark font-weight-bold">Discount <font style="color:red;"><b>*</b></font></label>
                                            <input type="text" name="discount" value="{{ $editData['discount']['discount'] }}" class="form-control form-control-sm"/>
                                            @error('discount')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                             </div>

                                             <div class="col-md-4 form-group">
                                                <label class="text-dark font-weight-bold">Year <font style="color:red;"><b>*</b></font></label>
                                                <select name="year_id" class="form-control form-control-sm">
                                                    <option value="">Select Year</option>
                                                   @foreach ($years as $year)
                                                       <option value="{{ $year->id }}" {{ (@$editData->year_id==$year->id)?"selected":"" }}>{{ $year->year }}</option>
                                                   @endforeach
                                                </select>
                                                @error('year_id')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                                 </div>

                                                 <div class="col-md-4 form-group">
                                                    <label class="text-dark font-weight-bold">Class <font style="color:red;"><b>*</b></font></label>
                                                    <select name="class_id" class="form-control form-control-sm">
                                                        <option value="">Select Class</option>
                                                       @foreach ($classes as $class)
                                                           <option value="{{ $class->id }}" {{ (@$editData->class_id==$class->id)?"selected":"" }}>{{ $class->class_name }}</option>
                                                       @endforeach
                                                    </select>
                                                    @error('class_id')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                     </div>

                                                     <div class="col-md-4 form-group">
                                                        <label class="text-dark font-weight-bold">Group</label>
                                                        <select name="group_id" class="form-control form-control-sm">
                                                            <option value="">Select Group</option>
                                                           @foreach ($groups as $group)
                                                               <option value="{{ $group->id }}" {{ (@$editData->group_id==$group->id)?"selected":"" }}>{{ $group->group }}</option>
                                                           @endforeach
                                                        </select>
                                                         </div>

                                                         <div class="col-md-4 form-group">
                                                            <label class="text-dark font-weight-bold">Shift</label>
                                                            <select name="shift_id" class="form-control form-control-sm">
                                                                <option value="">Select shift</option>
                                                               @foreach ($shifts as $shift)
                                                                   <option value="{{ $shift->id }}" {{ (@$editData->shift_id==$shift->id)?"selected":"" }}>{{ $shift->shift }}</option>
                                                               @endforeach
                                                            </select>
                                                             </div>

                                                             <div class="col-md-4 form-group">
                                                                <label class="text-dark font-weight-bold mb-2">Images</label>
                                                               <input type="file" class="form-control form-control-sm" name="img"  id="img"/>
                                                                 </div>

                                                                 <div class="col-md-4 form-group">
                                                                    <img id="showImg" src="{{ (!empty($editData['student']['img']))?asset('uploads/student_images/'.$editData['student']['img'])
                                                                    :asset('uploads/user.png') }}" alt="" style="width:100px;height:110px; border:2px solid #000;">
                                                                </div>
                   
      </div>
      <button type="submit" class="btn btn-primary text-light">Update</button>
          </form>
        </table>
      </div>
    </div>
  </div>
@endsection