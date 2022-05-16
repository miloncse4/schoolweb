@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-primary d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i>Fee Amount Details</i></h2>
        <a href="{{ route('setup.fee.amount.view') }}" 
        class="btn btn-sm btn-dark" style="font-weight: bold;"><i class="fa fa-list"></i> Show amount List</a>
      </div>
      <div class="card-body">
        @if(Session::has('message'))
       <div class="alert alert-primary">
         <strong>{{Session::get('message')}}</strong>
       </div>
       @endif
       <h4><strong>Fee type : </strong>{{ $edit_info['0']['fee_category']['fee_category'] }}</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                  <td><b>SL.</b></td>
                  <td><b>Class</b></td>
                  <td><b>Amount</b></td>
                </tr>
              </thead>
              <tbody>
               @forelse($edit_info as $info)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$info['student_class']['class_name']}}</td>
                  <td>{{ $info->amount }}</td>
                </tr>
                @empty
                <tr>
                    <td class="text-danger text-center" colspan="10">No data available in table</td>
                </tr>
                @endforelse
              </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection