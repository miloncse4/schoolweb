@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-dark d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i>Manage Assign Subject</i></h2>
        <a href="{{ route('setup.asign.subject.create') }}" 
        class="btn btn-sm btn-primary" style="font-weight: bold;"><i class="fa fa-plus-circle"></i> Assign subj add</a>
      </div>
      <div class="card-body">
        <marquee class="text-danger"><i><b><h2 class="text-dark"><b>Subject insert be carefull</b></h2>If insert misstack for class subject please delete class and add subject.</b></i></marquee>
        @if(Session::has('message'))
       <div class="alert alert-primary">
         <strong>{{Session::get('message')}}</strong>
       </div>
       @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                  <td><b>SL.</b></td>
                  <td><b>Class Name</b></td>
                  <td><b>Action</b></td>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $data)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$data['class_name']['class_name']}}</td>
                  <td>
                    <a href="{{ route('setup.asign.subject.details',$data->class_id) }}" title="Delails" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('setup.asign.subject.delete',$data->class_id) }}" id="delete" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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