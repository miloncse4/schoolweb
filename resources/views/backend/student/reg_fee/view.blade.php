@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-dark d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i>Student Registration Fee</i></h2>
        <a href="{{ route('student.regist.fee.create') }}" 
        class="btn btn-sm btn-light" style="font-weight: bold;"><i class="fa fa-plus-circle"></i> Add Fee</a>
      </div>
      <div class="card-body">
        @if(session('message'))
        <div class="alert alert-success alert-dismissable fade show">
            <strong>{{session('message')}}</strong>
        </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                  <td><b>SL</b></td>
                  <td><b>Class Name</b></td>
                  <td><b>Fee Name</b></td>
                  <td><b>Amount</b></td>
                  <td><b>Discount</b></td>
                  <td><b>Discount Fee</b></td>
                  <td><b>Option</b></td>
                </tr>
              </thead>
              <tbody>
               @forelse($all as $al)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$al->class_name}}</td>
                  <td>{{$al->fee_name}}</td>
                  <td>{{$al->amount}}</td>
                  <td>{{$al->discount}}</td>
                  <td>{{$al->total}}</td>
                  <td>
                    <a href="{{ route('student.regist.edit',$al->id) }}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('student.regist.delete',$al->id) }}" id="delete" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                  </td>
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