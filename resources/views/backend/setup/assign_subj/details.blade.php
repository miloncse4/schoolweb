@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-primary d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i>Subject Details</i></h2>
        <a href="{{ route('setup.asign.subject.view') }}" 
        class="btn btn-sm btn-dark" style="font-weight: bold;"><i class="fa fa-list"></i> subject List</a>
      </div>
      <div class="card-body">
        @if(Session::has('message'))
       <div class="alert alert-primary">
         <strong>{{Session::get('message')}}</strong>
       </div>
       @endif
       <h4><strong>Class Name : </strong>{{ $edit_info['0']['class_name']['class_name'] }}</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                  <td><b>SL.</b></td>
                  <td><b>Subject</b></td>
                  <td><b>Full Mark</b></td>
                  <td><b>Pass Mark</b></td>
                  <td><b>Subjective Mark</b></td>
                </tr>
              </thead>
              <tbody>
               @forelse($edit_info as $info)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$info['subject_name']['subject']}}</td>
                  <td>{{ $info->full_mark }}</td>
                  <td>{{ $info->pass_mark }}</td>
                  <td>{{ $info->get_mark }}</td>
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