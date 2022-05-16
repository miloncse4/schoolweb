@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-info d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i>Add Employee Attendance</i></h2>
        <a href="{{ route('emplyoee.attendance.view') }}" class="btn btn-sm btn-dark" style="font-weight:bold;">
        <i class="fa fa-bars"></i> Show Attendance</a>
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
          <form action="{{route('emplyoee.attendance.store')}}" method="post">
           @csrf
            <div class="form-group col-md-4">
                <label class="control-leabel text-dark">Attendance Date</label>
                <input type="date" name="date" id="date" class="form-control form-control-sm" 
                placeholder="Attendance Date"/>
                @error('date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <table class="table-sm table-bordered table-striped dt-responsive" style="width: 100%">
                <thead>
                    <tr>
                        <th rowspan="2" class="text-center text-dark" style="vertical-align: middle;">SL.</th>
                        <th rowspan="2" class="text-center text-dark" style="vertical-align: middle;">Employee Name</th>
                        <th colspan="3" class="text-center text-dark" style="vertical-align: middle; width:25%">Attendance Status</th>
                    </tr>
                    <tr style="cursor: pointer;">
                        <th class="text-center btn present_all bg-dark text-light" style="display: table-cell;">Present</th>
                        <th class="text-center btn leave_all bg-dark text-light" style="display: table-cell;">Leave</th>
                        <th class="text-center btn absent_all bg-dark text-light" style="display: table-cell;">Absent</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $key=> $employee)
                        <tr id="div{{ $employee->id }}" class="text-center">
                            <input type="hidden" name="employee_id[]" value="{{ $employee->id }}" class="employee_id"/>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $employee->name }}</td>
                            <td colspan="3">
                                <div class="switch-toggle switch-3 switch-candy">
                                    <input type="radio" class="present" id="present{{$key}}" name="attend_status{{$key}}" value="Present" checked="checked"/>
                                    <label style="cursor: pointer;" for="present{{$key}}">Present</label>

                                    <input type="radio" class="leave" id="leave{{$key}}" name="attend_status{{$key}}" value="Leave" checked="checked"/>
                                    <label style="cursor: pointer;" for="leave{{$key}}">Leave</label>

                                    <input type="radio" class="absent" id="absent{{$key}}" name="attend_status{{$key}}" value="Absent" checked="checked"/>
                                    <label style="cursor: pointer;" for="absent{{$key}}">Absent</label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table><br>
            <button type="submit" class="btn-info btn-sm"><b><i>Submit</i></b></button>
          </form>
        </table>
      </div>
    </div>
  </div>

  <script type="text/javascript"> 
        $(document).on('click','.present',function(){
         $(this).parents('tr').find('.datetime').css('pointer-events','none')
         .css('background-color','#dee2e6').css('color','#495057');
        });  

        $(document).on('click','.leave',function(){
         $(this).parents('tr').find('.datetime').css('pointer-events','')
         .css('background-color','white').css('color','#495057');
        });  

        $(document).on('click','.absent',function(){
         $(this).parents('tr').find('.datetime').css('pointer-events','none')
         .css('background-color','#dee2e6').css('color','#495057');
        });  
</script>
<script type="text/javascript">
 $(document).on('click','.present_all',function(){
   $("input[value=Present]").prop('checked',true);
   $('.datetime').css('pointer-events','none')
   .css('background-color','#dee2e6').css('color','#495057');
   });  

   $(document).on('click','.leave_all',function(){
   $("input[value=Leave]").prop('checked',true);
   $('.datetime').css('pointer-events','')
   .css('background-color','white').css('color','#495057');
   });

   $(document).on('click','.absent_all',function(){
   $("input[value=Absent]").prop('checked',true);
   $('.datetime').css('pointer-events','none')
   .css('background-color','#dee2e6').css('color','#495057');
   });
</script>
@endsection