@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header bg-dark d-sm-flex align-items-center justify-content-between">
        <h2 class="text-light"><i><b>All Users</b></i></h2>
        <a href="{{ route('user.create') }}" 
        class="btn btn-sm btn-primary" style="font-weight: bold;"><i class="fa fa-plus-circle"></i> Add user</a>
      </div>
      <div class="card-body">
        @if(Session::has('InsDone'))
       <div class="alert alert-success">
         <strong>{{Session::get('InsDone')}}</strong>
       </div>
       @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                  <td><b>#</b></td>
                  <td><b>Role</b></td>
                  <td><b>Name</b></td>
                  <td><b>Email</b></td>
                  <td><b>Code</b></td>
                  <td><b>Option</b></td>
                </tr>
              </thead>
              <tbody>
               @foreach($user_data as $user)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$user->role}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->code}}</td>
                  <td>
                    <a href="{{ route('user.edit',$user->id) }}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('user.delete',$user->id) }}" id="delete" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection