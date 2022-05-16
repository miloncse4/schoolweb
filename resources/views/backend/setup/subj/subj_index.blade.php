@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-dark d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i>Subject List</i></h2>
        <a href="{{ route('setup.subject.create') }}" 
        class="btn btn-sm btn-primary" style="font-weight: bold;"><i class="fa fa-plus-circle"></i> subject add</a>
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
                  <td><b>Subject</b></td>
                  <td><b>Action</b></td>
                </tr>
              </thead>
              <tbody>
               @forelse($subj as $value)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$value->subject}}</td>
                  <td>
                    <a href="{{ route('setup.subject.edit',$value->id) }}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    {{-- <a href="" id="delete" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> --}}
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