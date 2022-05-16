@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-warning d-sm-flex align-items-center justify-content-between">
        <h2 class="text-dark"><i><b>Edit Employee Leave</b></i></h2>
        <a href="{{ route('emplyoee.leave.view') }}" class="btn btn-sm btn-light" style="font-weight:bold;">
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
          <form action="{{route('emplyoee.leave.update',$editData->id)}}" method="post">
           @csrf
           <div class="form-row">     

            <div class="col-md-4 form-group">
                <label class="text-dark font-weight-bold">Employee name</label>
                <select name="employee_id" class="form-control form-control-sm">
                    <option value="">Select Employee</option>
                   @foreach ($employees as $employe)
                       <option value="{{ $employe->id }}" {{ (@$editData->employee_id==$employe->id)?'selected':'' }}>{{ $employe->name }}</option>
                   @endforeach
                </select>
                @error('employee_id')
                <small class="text-danger">{{$message}}</small>
                @enderror
                 </div>

                 <div class="col-md-4 form-group">
                    <label class="text-dark font-weight-bold">Start Date</label>
                    <input type="date" name="start_date" value="{{ $editData->start_date }}" class="form-control form-control-sm"/>
                    @error('start_date')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                     </div>

                     <div class="col-md-4 form-group">
                        <label class="text-dark font-weight-bold">End Date</label>
                        <input type="date" name="end_date" value="{{ $editData->end_date }}" class="form-control form-control-sm"/>
                        @error('end_date')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                         </div>

                         <div class="col-md-8 form-group">
                            <label class="text-dark font-weight-bold">Leave Purpose</label>
                            <select name="leave_purpose_id" id="leave_purpose_id" class="form-control form-control-sm">
                                <option value="">Select Purpose</option>
                               @foreach ($leave as $leav)
                                   <option value="{{ $leav->id }}" {{ (@$editData->leave_purpose_id==$leav->id)?'selected':'' }}>{{ $leav->name }}</option>
                               @endforeach
                               <option value="0">New Purpose</option>
                            </select>
                            <input type="text" name="name" class="form-control form-control-sm" placeholder="Write Purpose"
                            id="add_other" style="display: none;">
                            @error('leave_purpose_id')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                             </div>

                <div class="col-md-4 form-group">
                   <button type="submit" class="btn btn-warning btn-sm mt-4"><i><b>Update</b></i></button>
                </div>                    
      </div>
          </form>
        </table>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change','#leave_purpose_id',function(){
            var leave_purpose_id = $(this).val();
            if(leave_purpose_id == '0'){
                $('#add_other').show();
            }
            else{
                $('#add_other').hide();
            }
        });  
    });
</script>
@endsection