@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-dark d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i>Fee Amount of student</i></h2>
        <a href="{{ route('setup.fee.amount.create') }}" 
        class="btn btn-sm btn-primary" style="font-weight: bold;"><i class="fa fa-plus-circle"></i> Amount Add</a>
      </div>
      <div class="card-body">
        @if(Session::has('message'))
       <div class="alert alert-primary">
         <strong>{{Session::get('message')}}</strong>
       </div>
       @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                  <td><b>SL.</b></td>
                  <td><b>Fee Name</b></td>
                  <td><b>Action</b></td>
                </tr>
              </thead>
              <tbody>
               @forelse($amounts as $amount)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$amount['fee_category']['fee_category']}}</td>
                  <td>
                    <a href="{{ route('setup.fee.amount.details',$amount->fee_category_id) }}" title="Delails" class="btn btn-sm btn-danger"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('setup.fee.amount.edit',$amount->fee_category_id) }}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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