@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-dark d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>All Designation</b></i></h2>
        <a href="{{ route('setup.designation.create') }}" 
        class="btn btn-sm btn-light" style="font-weight: bold;"><i class="fa fa-plus-circle"></i> Designation create</a>
      </div>
      <div class="card-body">
        @if(Session::has('Done'))
       <div class="alert alert-primary">
         <strong>{{Session::get('Done')}}</strong>
       </div>
       @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                  <td><b><i>SL.</i></b></td>
                  <td><b><i>Designation</i></b></td>
                  <td><b><i>Option</i></b></td>
                </tr>
              </thead>
              <tbody>
               @forelse($all_data as $data)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$data->name}}</td>
                  <td>
                    <a href="{{ route('setup.designation.edit',$data->id) }}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('setup.designation.delete',$data->id) }}" id="delete" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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