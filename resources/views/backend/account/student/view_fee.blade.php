@extends('admin.admin_master')
@section('title','Grade view')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-primary d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>Student fee List</b></i></h2>
        <a href="{{ route('account.fee.add') }}" 
        class="btn btn-sm btn-light" style="font-weight: bold;"><i class="fa fa-plus-circle"></i> Add/Edit fee</a>
      </div>
      <div class="card-body">
        @if(Session::has('rong'))
        <div class="alert alert-warning">
          <strong>{{Session::get('rong')}}</strong>
        </div>
        @endif
        @if(Session::has('Done'))
       <div class="alert alert-primary">
         <strong>{{Session::get('Done')}}</strong>
       </div>
       @endif
        <table class="table table-bordered table-striped">
            <thead class="bg-primary text-light">
                <tr>
                  <td width="5%"><b><i>SL.</i></b></td>
                  <td><b><i>Id no</i></b></td>
                  <td><b><i>Name</i></b></td>
                  <td><b><i>Year</i></b></td>
                  <td><b><i>Class</i></b></td>
                  <td><b><i>Fee type</i></b></td>
                  <td><b><i>Amount</i></b></td>
                  <td><b><i>Date</i></b></td>
                  <td><b><i>Option</i></b></td>
                </tr>
              </thead>
              <tbody>
               @forelse($allData as $data)
                <tr class="{{ $data->id }}">
                  <td>{{$loop->index+1}}</td>
                  <td>{{ $data['student']['id_no'] }}</td>
                  <td>{{ $data['student']['name'] }}</td>
                  <td>{{ $data['year_name']['year'] }}</td>
                  <td>{{ $data['class_name']['class_name'] }}</td>
                  <td>{{ $data['fee_category']['fee_category'] }}</td>
                  <td>{{ $data->amount }} TK</td>
                  <td>
                    {{ date('M Y',strtotime($data->date)) }}    
                  </td>
                  <td>
                    <a href="{{ route('account.fee.delete',$data->id) }}" id="delete" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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