@extends('student.master')
 <?php
            if (isset($edit) && !empty($edit)){
                if ($edit['editmode'] === 'true')
                $editmode = true;
                else
                $editmode = false;
            }else {$editmode = false;}
            ?>
@section('title')

@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Students Result for primary 1 - Second term - 2017/2018
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">List of students</li>
        </ol>
    </section>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content" style="height:800px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Default Modal</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Enter Result for each Student</a></li>
                        <li><a href="#tab_2" data-toggle="tab">View All results in Database</a></li>
                        <li><a href="#tab_3" data-toggle="tab">Download All results</a></li>
                        <!--<li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Dropdown <span class="caret"></span>
                </a>
                            <ul class="dropdown-menu">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                            </ul>
                        </li>-->
                        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="bo">
                                <div class="box-header">
                                    <h3 class="box-title">Data Table With Full Features</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th>Image</th>
                                                <th>Admission Number</th>
                                                <th>Full name</th>
                                                <th>Class</th>
                                                <th>Address</th>
                                                <th>Admission year</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $student)
                                            <tr>
                                                <td>
                                                    <img class="profile-user-img img-responsive img-circle" src="{{url('/images/')}}/{{$student->image}}" alt="User profile picture">
                        
                                                </td>
                                                <td>{{$student->admission_no}}</td>
                                                <td>{{$student->firstname}}-{{$student->lastname}}</td>
                                                <td>SS1 (A)</td>
                                                <td>{{$student->current_address}}</td>
                                                <td>2013/2014</td>
                                                <td>
                                                    <a class="btn btn-primary"
                                                    @if (Auth::guard('teacher')->check())
                                                            href="{{route('teacher.report.student', $student->id)}}"
                                                    @elseif (Auth::guard('admin')->check())
                                                        href="{{route('admin.report.student', $student->id )}}"
                                                    @endif
                                                    >Enter Result</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>

                                                <th>Image</th>
                                                <th>Admission Number</th>
                                                <th>Full name</th>
                                                <th>Class</th>
                                                <th>Address</th>
                                                <th>Admission year</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="bo">
                                <div class="box-header">
                                    <h3 class="box-title">Data Table With Full Features</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <?php
                                    if (count($reports)<1)
                                    {
                                        echo '<div class="alert alert-warning> You have not generated reports for any student in this class</div>';
                                    }
                                    else{
                                    ?>
                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>
                                            <tr>

                                                <th>Image</th>

                                                <th>Action</th>
                                                <th>Admission Number</th>
                                                <th>Full name</th>
                                                <th>Class</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reports as $report)
                                            <tr>
                                                <td>
                                                    <img class="profile-user-img img-responsive img-circle" src="{{url('/images/')}}/{{$student->image}}" alt="User profile picture">
                        
                                                </td>
                                                <td><a href="{{action('StudentController@show', $report->id)}}">view</a></td>
                                                <td>{{$report->admission_no}}</td>
                                                <td>{{$report->student}}</td>
                                                <td>{{$clas->name}}-{{$clas->section}}</td>
                                                <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default">
                                                View Result
                                        </button></td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <!--<tfoot>
                                            <tr>

                                                <th>Image</th>

                                                <th>Action</th>
                                                <th>Admission Number</th>
                                                <th>Full name</th>
                                                <th>Class</th>
                                                <th>Address</th>
                                                <th>Act</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>-->
                                    </table>
                                    <?php
                                    } // end if count reports
                                    ?>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
                            recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
        </div>

</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>

@endsection