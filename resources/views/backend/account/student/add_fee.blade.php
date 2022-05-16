@extends('admin.admin_master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">          
      <div class="card">
        <div class="card-header bg-primary d-sm-flex align-items-center justify-content-between">
          <h3 class="card-title text-light"><b><i>Student Fee Add</i></b></h3>
          <a href="{{ route('home') }}" class="btn btn-light btn-sm"><i class="fa fa-home"></i> Home</a>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success">
          <strong>{{Session::get('success')}}</strong>
        </div>
        @endif
        <form method="POST" action="{{ route('account.fee.store') }}" id="MyForm">
        @csrf
          <div class="card-body">            
            <div class="form-row">                   
              <div class="form-group col-md-3">
                <label class="text-dark" for="year_id">Select Year</label>
                <select name="year_id" id="year_id" class="form-control select2bs4">
                  <option value="">Select Year</option>
                  @foreach($years as $year)
                      <option value="{{ $year->id }}" {{(@$year_id == $year->id)?"selected":""}}>{{ $year->year }}</option>
                  @endforeach
                </select>
                <font style="color: red"> 
                  {{($errors->has('year_id'))?($errors->first('year_id')):''}} 
                </font>                 
              </div>
              <div class="form-group col-md-3">
                <label class="text-dark" for="class_id">Select Class</label>
                <select name="class_id" id="class_id" class="form-control select2bs4">
                  <option selected value="">Select Class</option>
                  @foreach($classes as $class)
                      <option value="{{ $class->id }}" {{(@$class_id == $class->id)?"selected":""}}>{{ $class->class_name }}</option>
                  @endforeach
                </select>
                <font style="color: red"> 
                  {{($errors->has('class_id'))?($errors->first('class_id')):''}} 
                </font>                 
              </div>
              <div class="form-group col-md-3">
                <label>Fee Category</label>
                <select name="fee_category_id" id="fee_category_id" class="form-control select2bs4">
                    <option value="">Select Fee Categories</option>
                    @foreach ($fee_categories as $fee)
                        <option value="{{ $fee->id }}">{{ $fee->fee_category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Date</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
              <div class="form-group col-md-3">
                <a id="search" class="btn btn-primary text-light" style="cursor:pointer;" name="search"><i>Search</i></a>            
              </div>
            </div>            
          </div>
          <div class="card-body">
            <div class="d-none" id="marks-entry">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-dark text-light">
                    <th>ID No</th>
                    <th>Student Name</th>
                    <th>Father's Name</th>
                    <th>Fee</th>
                  </tr>
                </thead>
                <tbody id="marks-entry-tr">
                          
                </tbody>
              </table>
              <div class="form-group col-md-3" style="margin-top: 30px;">
                <button type="submit" class="btn btn-dark text-light">Submit</button>         
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  //Marks Entry
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    var fee_category_id = $('#fee_category_id').val();
    var date = $('#date').val();
  
    $.ajax({
      url: "{{route('accounts.fee.getstudent')}}",
      type: "GET",
      data: {'year_id': year_id,'class_id':class_id,'fee_category_id':fee_category_id,'date':date},
      success: function(data){
        $('#marks-entry').removeClass('d-none');
        var html = '';
        $.each(data, function(key, v){
          html +=
          '<tr>'+
          '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"><input type="hidden" name="id_no[]" value="'+v.student.id_no+'"></td>'+
          '<td>'+v.student.name+'</td>'+
          '<td>'+v.student.fname+'</td>'+
          '<td><input type="text" class="form-control" name="amount[]"></td>'+
          '</tr>';
        });
        html = $('#marks-entry-tr').html(html);
      }
    });
  });
</script>

@endsection