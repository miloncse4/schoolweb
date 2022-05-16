@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="card mt-5">
      <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h2><i>Your Profile</i></h2>
      </div>
      <div class="card-body">
        @if(Session::has('message'))
       <div class="alert alert-danger">
         <strong>{{Session::get('message')}}</strong>
       </div>
       @endif

       <div class="col-md-4 offset-md-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
               src="{{ (!empty($user->img))?asset('uploads/user_img/'.$user->img)
              :asset('uploads/user.png') }}" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $user->name }}</h3>

            <p class="text-muted text-center">{{ $user->address }}</p>

            <table width="100%" class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Mobile No</td>
                        <td>{{ $user->mobile }}</td>
                    </tr>

                    <tr>
                        <td>Email </td>
                        <td>{{ $user->email }}</td>
                    </tr>

                    <tr>
                        <td>Gender</td>
                        <td>{{ $user->gander }}</td>
                    </tr>

                </tbody>
            </table>

            <a href="{{ route('profile.edit',$user->id) }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- /.card -->
      </div>

      </div>
    </div>
  </div>
@endsection