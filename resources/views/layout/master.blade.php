<!doctype html>
<html lang="en">
@yield('head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo" style="padding-left:0">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>IDP</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?php echo Config::get('constants.school_name');?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ URL::asset('dist/img/profile.png')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ URL::asset('dist/img/profile.png')}}" class="img-circle" alt="User Image">

                            <p>
                                {{ Auth::user()->name }} - @if (Auth::guard('teacher')->check())
                                    Teacher
                                @elseif (Auth::guard('admin')->check())
                                Admin
                                @endif
                                <small></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <!--<div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>-->
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <!--<div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>-->
                            <div class="pull-right">
                                
                                        

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!--<p style="color:white"> Current Session: </p>-->
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ URL::asset('dist/img/profile.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }} - 
                   @if (Auth::guard('teacher')->check())
                     Teacher
                    @elseif (Auth::guard('admin')->check())
                    Admin
                    @endif
                    </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            
            <li class="">
                <a
                @if (Auth::guard('teacher')->check())
                                        href="/teacher/home"
                                @elseif (Auth::guard('admin')->check())
                                        href="/admin/home"
                                @endif
                >
                    <i class="fa fa-dashboard"></i> <span>Home</span>
                </a>
                <!--<ul class="treeview-menu">
                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                </ul>-->
            </li>
            @if (Auth::guard('admin')->check())
            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-user"></i> <span>Students</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{!! action('StudentController@register_form') !!}">
                                <i class="fa fa-folder"></i> <span>Register Students</span>
                            </a>
                        </li>
                        <li>
                            <a href="{!! action('StudentController@index') !!}">
                                <i class="fa fa-folder"></i> <span>View & Manage Students</span>
                            </a>
                        </li>
                    </ul>
                </a>
            </li>
            @endif
            <li class="treeview">
                            <a href="#">
                                <i class="fa fa-calendar-check-o"></i> <span>Attendance</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active">
                                    <a
                                    @if (Auth::guard('teacher')->check())
                                        href="/teacher/attendance"
                                    @elseif (Auth::guard('admin')->check())
                                        href="/admin/attendance"
                                    @endif 
                                    >
                                    <i class="fa fa-angle-double-right"></i> Student Attendance</a></li>
                                <li class=""><a 
                                @if (Auth::guard('teacher')->check())
                                        href="/teacher/attendance/date"
                                    @elseif (Auth::guard('admin')->check())
                                        href="/admin/attendance/date"
                                    @endif 
                                    ><i class="fa fa-angle-double-right"></i> Attendance By Date</a></li>
                                <li class=""><a 
                                @if (Auth::guard('teacher')->check())
                                        href="/teacher/attendance/report"
                                    @elseif (Auth::guard('admin')->check())
                                        href="/admin/attendance/report"
                                    @endif ><i class="fa fa-angle-double-right"></i> Attendance Report</a></li>
                            </ul>
                        </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-mortar-board"></i> <span>Academics</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a
                    @if (Auth::guard('teacher')->check())
                     href="/teacher/timetable"
                    @elseif (Auth::guard('admin')->check())
                    href="/admin/timetable"
                    @endif
                     ><i class="fa fa-angle-double-right"></i> Class Timetable</a></li>

                    @if (Auth::guard('admin')->check())
                    <li class=""><a href="{!! action('AssignController@index') !!}"><i class="fa fa-angle-double-right"></i> Assign Subjects</a></li>
                    <li class=""><a href="{!! action('SubjectController@index') !!}"><i class="fa fa-angle-double-right"></i> Subjects</a></li>
                    <li class=""><a href="{!! action('TeacherController@index') !!}"><i class="fa fa-angle-double-right"></i> Teachers</a></li>
                    <li class=""><a href="{!! action('TheClassController@index') !!}"><i class="fa fa-angle-double-right"></i> Class</a></li>
                    @endif
                </ul>
            </li>
            <li class="treeview">
                            <a href="#">
                                <i class="fa fa-map-o"></i> <span>Examinations</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class=""><a href="{{action('ExamScheduleController@show_schedule_form')}}"><i class="fa fa-angle-double-right"></i> Exam Schedule</a></li>
                                <li class=""><a href="{{action('MarkController@index')}}"><i class="fa fa-angle-double-right"></i> Marks Register</a></li>
                                <li ><a 
                                @if (Auth::guard('teacher')->check())
                                        href="/teacher/gradereport"
                                @elseif (Auth::guard('admin')->check())
                                        href="/admin/gradereport"
                                @endif
                                ><i class="fa fa-angle-double-right"></i> Grade Report</a></li>
                            </ul>
            </li>
            <!--<li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Scratch card</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{action('ScratchCardController@index')}}">
                            <i class="fa fa-folder"></i> <span>Generate Scratch Card</span>

                        </a>
                    </li>
                    <li>
                        <a href="{{action('ScratchCardController@viewAll')}}">
                            <i class="fa fa-folder"></i> <span>View Scratch card usage</span>
                        </a>
                    </li>
                </ul>
            </li>-->
            <!--<li class="">
                <a href="{{action('CalendarController@index')}}">
                    <i class="fa fa-calendar"></i> <span>School Calendar</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="calendar.php">
                    <i class="fa fa-calendar"></i> <span>Parent</span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="parent.php?page=login">
                            <i class="fa fa-folder"></i> <span>Login</span>
                        </a>
                    </li>
                    <li>
                        <a href="parent.php?page=student">
                            <i class="fa fa-folder"></i> <span>Student</span>
                        </a>
                    </li>
                </ul>
            </li>-->
            <!--<li>
                    <a href="register.php">
                        <i class="fa fa-folder"></i> <span>Photo Gallery</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                </li>-->

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

@yield('content')
@yield('footer')


</body>
</html>