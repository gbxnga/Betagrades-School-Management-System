@extends('student.master')

@section('title')
Class Timetable for <?= $clas['name'].' ' .$clas['section'];?>
@endsection
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Timetable
            <small>timetable</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">timetable : <?= $clas['name'].' ' .$clas['section'];?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
    @if (session('status'))
                <div class="col-md-12"><div class="alert alert-success">
                    {{ session('status') }}
                </div></div>
            @endif
            <?php
            if (isset($edit) && !empty($edit)){
                $editmode = true;
            }else {$editmode = false;}
            ?>
            <div class="col-xs-12 col-lg-12 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">View Timetable</h3>
                        <a 
                        @if (Auth::guard('teacher')->check())
                        href="/teacher/timetable/create" 
                        @endif
                        @if (Auth::guard('admin')->check())
                        href="/admin/timetable/create" 
                        @endif
                        class="btn btn-success pull-right">Create Timetable</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="search_timetable_form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Class</label>
                            <select id="select_class_id" name="class_id" class="form-control">
                                    <option value="">Select Class</option>
                                    @foreach($classes as $class)
                                                
                                                    <option
                                                    <?php
                                                    if ($editmode)
                                                    {
                                                        if($class['id'] === $clas['id'])
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>
                                                     value="{!! $class->id !!}">{!! $class->name !!} - {{$class->section}}</option>
                                                
                                    @endforeach
                                </select>
                            <span class="class_id_error text-danger"></span>
                        </div>
                        <button type="submit" id="search_filter" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle"><i class="fa fa-search"></i> View Timetable</button>
            
                    </div>
                      </div>
                
            </div>
        </form>
        </div>
        </div>
        </div>
                <div class="col-xs-12 col-lg-12 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    @if (count($timetables)<1)
                        <br/><div class="col-md-12"><div class="alert alert-danger">No time table record for <?= $clas['name'].' ' .$clas['section'];?></div></div>
                    @else
                    <div class="box-header with-border">
                        <h4>Class Timetable for <strong><?= $clas['name'].' ' .$clas['section'];?></strong></h4>
                    </div>
                    <!-- /.box-header -->
        
                        
                      <div class="box-body ">  
                      <div class="table-responsive">
                                <table id="example1" class="table table-hover table-striped exampl1">
                        <!--<table class="table table-bordered example1">-->
                            <br/>
                        
                             
                        <thead>
                            <th style="display:none">S/N</th>
                            <th>Day</th>
                            <th>Period 1<br/><span style="color:#cccccc;">8-9</span></th>
                            <th>Period 2<br/><span style="color:#cccccc;">9-10</span></th>
                            <th>Period 3<br/><span style="color:#cccccc;">10-11</span></th>
                            <th>Period 4<br/><span style="color:#cccccc;">11-12</span></th>
                            <th>Period 5<br/><span style="color:#cccccc;">12-1</span></th>
                            <th>Period 6<br/><span style="color:#cccccc;">1-2</span></th>
                            <th>Period 7<br/><span style="color:#cccccc;">1-3</span></th>
                            <th>Period 8<br/><span style="color:#cccccc;">3-4</span></th>
                        </thead>
                    <tbody>
                            @foreach($timetables as $timetable)
                            <tr>
                                <td style="display:none">1</td>
                            <td>{!! $timetable->day !!}</td>
                            <td>{!! $timetable->P1 !!} </td>
                            <td>{!! $timetable->P2 !!} </td>
                            <td>{!! $timetable->P3 !!} </td>
                            <td>{!! $timetable->P4 !!} </td>
                            <td>{!! $timetable->P5 !!} </td>
                            <td>{!! $timetable->P6 !!} </td>
                            <td>{!! $timetable->P7 !!} </td>
                            <td>{!! $timetable->P8 !!} </td>
                            </tr>
                            @endforeach 
                    </tbody> 
                        
                        </table>
                        </div>


                        <div class="box-footer">
                            <a 
                            @if (Auth::guard('admin')->check())
                            href="/admin/timetable/edit/{{$clas['id']}}"
                            @elseif (Auth::guard('teacher')->check())
                            href="/teacher/timetable/edit/{{$clas['id']}}"
                            @endif
                           
                            
                            class="btn btn-primary pull-right">Edit Timetable</a>
                        </div>
                    
                </div>
                </div>
                @endif
                <!-- /.box -->
            </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
</section>
@endsection