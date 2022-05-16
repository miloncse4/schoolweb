
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('backend')}}/js/jquery.min.js"></script>
	<link rel="icon" href="{{asset('backend')}}/images/favicon.ico" type="image/ico" />

<title>@yield('title') {{ config('app.name', 'School') }}</title>

    <!-- Bootstrap -->
    <link href="{{asset('backend')}}/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('backend')}}/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('backend')}}/css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    @yield('backend_css')
    <!-- Custom Theme Style -->
    <link href="{{asset('backend')}}/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
        .notifyjs-corner{
          z-index: 10000 !important;
        }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" target="_blank" class="site_title">
                <img src="{{asset('uploads/Logo/dashboard.jpg')}}" alt="{{config('app.name')}}"/>
                </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ (!empty(Auth::user()->img))?asset('uploads/user_img/'.Auth::user()->img)
                :asset('uploads/user.png') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Dashboard</h3>
                <ul class="nav side-menu">
                  
                  @if(Auth::user()->role=='Admin')
                  <li><a href="{{ route('user.view') }}"><i class="fa fa-home"></i>User Management</a>
                  </li>
                  @endif

                  <li><a><i class="fa fa-user"></i> Profile manage <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('profile.add') }}">Your profile</a></li>
                      <li><a href="{{ route('profile.password') }}">Change Password</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Students Setup <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('setup.student.view') }}">Student Class</a></li>
                      <li><a href="{{ route('setup.student.year.view') }}">View Year/Session</a></li>
                      <li><a href="{{ route('setup.student.group.view') }}">Student Group</a></li>
                      <li><a href="{{ route('setup.student.shift.view') }}">Student Shift</a></li>
                      <li><a href="{{ route('setup.fee.view') }}">Fee Category</a></li>
                      <li><a href="{{ route('setup.fee.amount.view') }}">Fee Category Amount</a></li>
                      <li><a href="{{ route('setup.exam.type.view') }}">Exam Type</a></li>
                      <li><a href="{{ route('setup.subject.view') }}">Subject</a></li>
                      <li><a href="{{ route('setup.asign.subject.view') }}">Assign subject</a></li>
                      <li><a href="{{ route('setup.designation.view') }}">Designation</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-clone"></i> Student Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('student.reg.view') }}">Student Regestration</a></li>
                      <li><a href="{{ route('student.regist.fee.view') }}">Regestration Fee</a></li>
                      <li><a href="{{ route('student.monthly.view') }}">Monthly Fee</a></li>
                      <li><a href="{{ route('student.exam.view') }}">Exam Fee</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-table"></i> Employee Manage <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('emplyoee.reg.index')}}">Emplyoee Registration</a></li>
                      <li><a href="{{ route('emplyoee.salary.view')}}">Emplyoee Salary</a></li>
                      <li><a href="{{ route('emplyoee.leave.view')}}">Emplyoee Leave</a></li>
                      <li><a href="{{ route('emplyoee.attendance.view')}}">Emplyoee Attendance</a></li>
                    </ul>
                  </li>

                   <li><a><i class="fa fa-bar-chart-o"></i> Marks Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('marks.add') }}">Mark Entry</a></li>
                      <li><a href="{{ route('marks.edit') }}">Mark Edit</a></li>
                      <li><a href="{{ route('marks.grade.index') }}">Grade Point</a></li>
                    </ul>
                  </li>

                     <li><a><i class="fa fa-bug"></i> Account Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('account.fee.view') }}">Student fee</a></li>
                      <li><a href="{{ route('salary.view') }}">Employee Salary</a></li>
                      <li><a href="{{ route('othercost.view') }}">Other Cost</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-windows"></i> Report Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('attendance.view') }}">Attendance Report</a></li>
                      <li><a href="{{ route('result.view') }}">Student Results</a></li>
                      <li><a href="{{ route('marksheet.view') }}">Marksheet</a></li>
                      <li><a href="{{ route('student_id.view') }}">Student ID card</a></li>
                    </ul>
                  </li>

                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ (!empty(Auth::user()->img))?asset('uploads/user_img/'.Auth::user()->img)
                    :asset('uploads/user.png') }}" alt="">Account
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <!-- page content -->

        @if(session()->has('success'))
        <script type="text/javascript">
        $(function(){
          $.notify("{{ session()->get('success') }}",{globalPosition:'top right',
          className:'success'});
        });
        </script>
        @endif

        <div class="right_col" role="main">
        @yield('content')
        </div>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Devlop - By <a href="https://colorlib.com"><i>milon CSE</i></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->   
    <script src="{{asset('backend')}}/js/Chart.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{asset('backend')}}/js/bootstrap.bundle.min.js"></script>
    <!-- NProgress -->
    <script src="{{asset('backend')}}/js/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('backend')}}/js/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <!-- Custom Theme Scripts -->
    <script src="{{asset('backend')}}/js/custom.min.js"></script>
    <script src="{{asset('backend')}}/js/notify.min.js"></script>
    <script src="{{asset('backend')}}/js/sweetalert2@11.js"></script>
    <script src="{{asset('backend')}}/js/handlebars-v4.0.12.js"></script>
    @yield('backend_js')

    <script type="text/javascript">
  $(function(){
    $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link = $(this).attr('href');

      Swal.fire({
  title: 'Are you sure?',
  text: "Delete this data.!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link;
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

    });
  });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#img').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#showImg').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      });
    });
    </script>
  </body>
</html>
