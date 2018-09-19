<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo Config::get('constants.school_name');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ URL::asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
        <!-- Date Picker -->
    <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ URL::asset('bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('bower_components/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ URL::asset('dist/css/skins/_all-skins.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="{{ URL::asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
  <script src="{{ URL::asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">

    <div class="modal fade" id="modal-add-event">
        <div class="modal-dialog">
            <div class="modal-content" >
                <div class="modal-header btn-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Events</h4>
                </div>
                <form method="post" action="{{action('CalendarController@addEvent')}}">
                 <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="modal-body" style="height:300px">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Event Title</label>
                            <input id="title" name="title" placeholder="" type="text" class="form-control" value="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <!-- Date and time range -->
                    <div class="form-group">
                        <label>Date and time range:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <input type="text" name="daterange" class="form-control pull-right datepicker" id="reservationtim">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-add-news">
        <div class="modal-dialog">
            <div class="modal-content" >
                <div class="modal-header btn-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add News</h4>
                </div>
                <form method="post" action="{{action('CalendarController@addNews')}}">
                 <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="modal-body" style="height:300px">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input id="title" name="title" placeholder="" type="text" class="form-control" value="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <!-- Date and time range -->
                    <div class="form-group">
                        <label>News:</label>
                            <textarea style="width:100%" name="news" class="form-control"></textarea>
                        
                    </div>
                    <!-- /.form group -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Upload changes</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <div class="wrapper">

<header class="main-header">
    <!-- Logo -->
    <a href="{!! action('CalendarController@index') !!}" class="logo" style="padding-left:0">
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
                               {{ Auth::user()->name }} - Admin
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
                <p>{{ Auth::user()->name }} - Admin</p>
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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Calendar
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a 
            @if (Auth::guard('teacher')->check())
                                        href="/teacher/home"
                                @elseif (Auth::guard('admin')->check())
                                        href="/admin/home"
                                @endif
            ><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Calendar</li>
        </ol>
    </section>
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Students</span>
              <span class="info-box-number">{{App\Student::count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Teachers</span>
              <span class="info-box-number">{{App\Teacher::count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Subjects</span>
              <span class="info-box-number">{{App\Subject::count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-home"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Classes</span>
              <span class="info-box-number">{{App\TheClass::count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      </div>
      @if (session('status'))
               <div class="ro"><div class="col-md-12"><div class="alert alert-success">
                    {{ session('status') }}
                </div></div></div>
            @endif
    @if($errors->any())
    <div class="col-md-12">
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
                    {{ $error }}
    </div>
    @endforeach
    </div>
    @endif
 @if (Auth::guard('admin')->check())     
<div class="row">
    <div class="col-md-8"><button style="margin-left:15px" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-event">Add Event</button></div>
    <div class="col-md-4"><button class="btn btn-primary" data-toggle="modal" data-target="#modal-add-news">Add News</button></div>
</div>
@endif
    <!-- Main content -->
    <section class="content">
    
        <div class="row">
            <!-- /.col -->
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <!-- THE CALENDAR -->
                        <div id="calendar"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        <div class="col-md-4">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    School News
                  </span>
            </li>
            <!-- /.timeline-label -->
            @foreach ($news as $news)
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('Y-m-d',strtotime($news->created_at));?></span>

                <h3 class="timeline-header"><a href="#">{{$news->title}}</a> </h3>

                <div class="timeline-body">
                  <?php echo substr($news->news, 0, 150)."...";?>
                </div>
                <div class="timeline-footer">
                  <a 
                  @if (Auth::guard('teacher')->check())
                     href="{{route('teacher.news', $news->id)}}"
                    @elseif (Auth::guard('admin')->check())
                    href="{{action('NewsController@view', $news->id)}}"
                @endif 
                    
                    class="btn btn-primary btn-xs">Read more</a>
                  @if (Auth::guard('admin')->check())
                  <a href="{!! action('NewsController@delete', $news->id) !!}" onclick="return confirm('Are you sure you want to delete this News? All related data can not be recovered!');" class="btn btn-danger btn-xs">Delete</a>
                  @endif
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            @endforeach
            
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.2.0
    </div>
    <strong>Copyright &copy; 2017 <a href="https://betagrades.com">BetaGrades.com</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ URL::asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('dist/js/demo.js')}}"></script>

<!-- fullCalendar -->
<script src="{{ URL::asset('bower_components/moment/moment.js')}}"></script>
<script src="{{ URL::asset('bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{ URL::asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ URL::asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script>
        //Date range picker
    $('#reservation').daterangepicker()
        //Date range picker with time picker
    $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            format: 'MM/DD/YYYY h:mm A'
        })
        //Date range as a button
    $('#daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function(start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    )
    </script>
<!-- Page specific script -->
<script>
    $(function() {
                             //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            })
              $('.datepicker').datepicker({
                autoclose: true
            })

        /* initialize the external events
         -----------------------------------------------------------------*/
        function init_events(ele) {
            ele.each(function() {

                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                }

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject)

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1070,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                })

            })
        }

        init_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'today',
                month: 'month',
                week: 'week',
                day: 'day'
            },
            //Random default events
            events: [ 
                
                    @foreach ($events as $event)
                    {title: '{{$event->title}}', start: '<?php echo substr($event->start, 0, 10); ?>'} @if(  count($events)>1) , @endif
                    @endforeach
            
            ],
            event: [{
                title: 'All Day Event',
                start: '2017-09-15 12:00:00',
                backgroundColor: '#f56954', //red
                borderColor: '#f56954' //red
            },{
                title: 'Another All Day Event',
                start: '2017-09-15 12:00:00',
                backgroundColor: '#f56954', //red
                borderColor: '#f56954' //red
            }, {
                title: 'Long Event',
                start: new Date(y, m, d - 5),
                end: new Date(y, m, d - 2),
                backgroundColor: '#f39c12', //yellow
                borderColor: '#f39c12' //yellow
            }, {
                title: 'Meeting',
                start: new Date(y, m, d, 10, 30),
                allDay: false,
                backgroundColor: '#0073b7', //Blue
                borderColor: '#0073b7' //Blue
            }, {
                title: 'Lunch',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false,
                backgroundColor: '#00c0ef', //Info (aqua)
                borderColor: '#00c0ef' //Info (aqua)
            }, {
                title: 'Birthday Party',
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                allDay: false,
                backgroundColor: '#00a65a', //Success (green)
                borderColor: '#00a65a' //Success (green)
            }, {
                title: 'Click for Google',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: 'http://google.com/',
                backgroundColor: '#3c8dbc', //Primary (light-blue)
                borderColor: '#3c8dbc' //Primary (light-blue)
            }],
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(date, allDay) { // this function is called when something is dropped

                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject')

                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject)

                // assign it the date that was reported
                copiedEventObject.start = date
                copiedEventObject.allDay = allDay
                copiedEventObject.backgroundColor = $(this).css('background-color')
                copiedEventObject.borderColor = $(this).css('border-color')

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove()
                }

            }
        })

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
            //Color chooser button
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function(e) {
            e.preventDefault()
                //Save color
            currColor = $(this).css('color')
                //Add color effect to button
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
            })
        })
        $('#add-new-event').click(function(e) {
            e.preventDefault()
                //Get value and make sure it is not null
            var val = $('#new-event').val()
            if (val.length == 0) {
                return
            }

            //Create events
            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color': currColor,
                'color': '#fff'
            }).addClass('external-event')
            event.html(val)
            $('#external-events').prepend(event)

            //Add draggable funtionality
            init_events(event)

            //Remove event from text input
            $('#new-event').val('')
        })
    })


</script>
</body>

</html>
