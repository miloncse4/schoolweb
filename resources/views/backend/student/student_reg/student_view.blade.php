@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-primary d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Student List</b></i></h2>
        <a href="{{ route('student.reg.add') }}" 
        class="btn btn-sm btn-dark" style="font-weight: bold;"><i class="fa fa-plus-circle"></i> Add student</a>
      </div>

      <div class="card-body">
        <form action="{{ route('student.reg.search') }}" method="GET" id="myForm">
          <div class="form-row">
            <div class="col-md-4 form-group">
              <label class="text-dark font-weight-bold">Year <font style="color:red;"><b>*</b></font></label>
              <select name="year_id" class="form-control form-control-sm">
                  <option value="">Select Year</option>
                 @foreach ($years as $year)
                     <option value="{{ $year->id }}" {{ (@$year_id==$year->id)?"selected":"" }}>{{ $year->year }}</option>
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
                         <option value="{{ $class->id }}" {{ (@$class_id==$class->id)?"selected" :"" }}>{{ $class->class_name }}</option>
                     @endforeach
                  </select>
                  @error('class_id')
                  <small class="text-danger">{{$message}}</small>
                  @enderror
                   </div>
                 <div class="col-md-4 form-group" style="padding-top: 28px;">
                   <button type="submit" class="btn btn-primary btn-sm" name="search">Search</button>
                  </div>             
          </div>
        </form>
      </div>

      <div class="card-body">
        @if(Session::has('success'))
       <div class="alert alert-primary">
         <strong>{{Session::get('success')}}</strong>
       </div>
       @endif
       @if(!@$search)
        <table class="table table-bordered">
            <thead>
                <tr>
                  <td width="7%"><b>SL.</b></td>
                  <td><b>Name</b></td>
                  <td><b>ID NO</b></td>
                  <td><b>Roll</b></td>
                  <td><b>Year</b></td>
                  <td><b>Class</b></td>
                  <td><b>Images</b></td>
                  @if(Auth::user()->role == "Admin")
                  <td><b>Code</b></td>
                  @endif
                  <td width="16%"><b>Option</b></td>
                </tr>
              </thead>
              <tbody>
               @forelse($allData as $data)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$data['student']['name']}}</td>
                  <td>{{$data['student']['id_no']}}</td>
                  <td>{{$data->roll}}</td>
                  <td>{{$data['year_name']['year']}}</td>
                  <td>{{$data['class_name']['class_name']}}</td>
                  <td>
                    <img id="showImg" src="{{ (!empty($data['student']['img']))?asset('uploads/student_images/'.$data['student']['img'])
                    :asset('uploads/user.png') }}" alt="" style="width:70px;height:80px;">
                  </td>
                  @if(Auth::user()->role == "Admin")
                  <td>{{ $data['student']['code'] }}</td>
                  @endif
                  <td>
                    <a href="{{ route('student.reg.edit',$data->student_id) }}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('student.reg.promotion',$data->student_id) }}" title="Promotion" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                    <a href="{{ route('student.reg.details',$data->student_id) }}" title="Details" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                   {{-- @if($data['student']['status'])
                     <a href="{{ route('student.reg.inactive',$data['student']['id']) }}" class="btn btn-danger btn-sm">Iactive</a>
                   @else
                   <a href="" class="btn btn-success btn-sm">Active</a>
                   @endif                  --}}
                  </td>
                </tr>
                @empty
                <tr>
                    <td class="text-danger text-center" colspan="10">No data available in table</td>
                </tr>
                @endforelse
              </tbody>
        </table>
        @else
        <table class="table table-bordered">
          <thead>
              <tr>
                <td width="7%"><b>SL.</b></td>
                <td><b>Name</b></td>
                <td><b>ID NO</b></td>
                <td><b>Roll</b></td>
                <td><b>Year</b></td>
                <td><b>Class</b></td>
                <td><b>Images</b></td>
                @if(Auth::user()->role == "Admin")
                <td><b>Code</b></td>
                @endif
                <td width="16%"><b>Option</b></td>
              </tr>
            </thead>
            <tbody>
             @forelse($allData as $data)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$data['student']['name']}}</td>
                <td>{{$data['student']['id_no']}}</td>
                <td>{{$data->roll}}</td>
                <td>{{$data['year_name']['year']}}</td>
                <td>{{$data['class_name']['class_name']}}</td>
                <td>
                  <img id="showImg" src="{{ (!empty($data['student']['img']))?asset('uploads/student_images/'.$data['student']['img'])
                  :asset('uploads/user.png') }}" alt="" style="width:70px;height:80px;">
                </td>
                @if(Auth::user()->role == "Admin")
                <td>{{ $data['student']['code'] }}</td>
                @endif
                <td>
                  <a href="{{ route('student.reg.edit',$data->student_id) }}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                  <a href="{{ route('student.reg.promotion',$data->student_id) }}" title="Promotion" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                  <a href="{{ route('student.reg.details',$data->student_id) }}" title="Details" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                </td>
              </tr>
              @empty
              <tr>
                  <td class="text-danger text-center" colspan="10">No data available in table</td>
              </tr>
              @endforelse
            </tbody>
      </table>
        @endif
      </div>
    </div>
  </div>
@endsection