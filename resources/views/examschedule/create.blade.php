@extends('student.master')

@section('title')
Class
@endsection
@section('content')


<div class="content-wrapper" style="min-height: 681px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-map-o"></i> Examinations <small></small> </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            @if (session('status'))
                <div class="col-md-12"><div class="alert alert-success">
                    {{ session('status') }}
                </div></div>
            @endif
            <?php
            if (isset($edit) && !empty($edit)){
                if ($edit['editmode'] === 'true')
                $editmode = true;
                else
                $editmode = false;
            }else {$editmode = false;}
            ?>

            <div class="col-md-12">

                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> Select Criteria</h3>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <form method="post" accept-charset="utf-8" id="schedule-form">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="box-body">
                            <div class="row">
                                <input type="hidden" name="save_exam" value="search">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Exam Name</label>

                                        <select id="exam" name="exam" class="form-control">
                                            <option value="">Select</option>

                                                    <option value="CA 1"
                                                    <?php
                                                    if ($editmode)
                                                    {
                                                       if($request->exam === 'CA 1')
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>
                                                     >CA 1</option>
                                                    <option value="CA 2"
                                                    <?php
                                                    if ($editmode)
                                                    {
                                                       if($request->exam === 'CA 2')
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>
                                                     >CA 2</option>

                                                    <option value="EXAM" 
                                                    <?php
                                                    if ($editmode)
                                                    {
                                                       if($request->exam === 'EXAM')
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>
                                                    >EXAM</option>
                                                    

                                            </select>
                                        <span class="text-danger"></span>
                                    </div>

                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Class</label>

                                        <select id="class_id" name="class_id" class="form-control">
                                            <option value="">Select</option>
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
                                        <span class="text-danger"></span>
                                    </div>

                                </div>

                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="search" value="search" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-search"></i> Search</button>
                        </div>

                    </form>
                </div>
                <?php
                if ($editmode){

                    if (count($subjects)<1)
                    {
                        echo '<div class="alert alert-danger">There are no subjects assigned to this class</div>';
                    }
                    else
                    {

                ?>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-list"></i> Exam Schedule</h3>
                        <?php 
                        if (isset($schedules) && !empty($schedules)){
                            echo '<div class="alert alert-success">Exams Already Scheduled for this class. You are now editing the schedule</div>';
                        }
                        ?>

                    </div>
                    <div class="box-body">
                        <form role="form" class="addschedule-form" method="post"
                        <?php 
                        if (isset($schedules) && !empty($schedules)){
                        ?>
                        @if (Auth::guard('teacher')->check())
                            action="{{route('teacher.schedule.update')}}"
                            @elseif (Auth::guard('admin')->check())
                            action="{{route('admin.schedule.update')}}"
                        @endif
                        <?php
                        }else{
                        ?>
                        @if (Auth::guard('teacher')->check())
                            action="{{route('teacher.schedule.save')}}"
                            @elseif (Auth::guard('admin')->check())
                            action="{{route('admin.schedule.save')}}"
                        @endif
                        <?php
                        }
                        ?>
                          
                         novalidate="novalidate">
                            <input type="text"
                                        <?php
                                            if ($editmode)
                                            {
                                                echo 'value="'.$request->exam. '"';
                                            }
                                        ?>
                                         name="exam" hidden="hidden">
                            <input hidden="hidden" type="text" name="class_id" value="<?= $request->class_id;?>">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Subject </th>
                                            <th>Date </th>
                                            <th>Start Time </th>
                                            <th>End Time </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subjects as $subject)
                                        <tr>
                                            <td>
                                                <div class="form-group">{{$subject->subject}} </div>
                                            </td>
                                            <td>
                                                <div class="form-group">

                                                    <input type="text"
                                                    <?php 
                                                    if (isset($schedules) && !empty($schedules)){
                                                        ?>
                                                    @foreach ($schedules as $schedule)
                                                            <?php $update=false;?>
                                                            @if ($schedule->subject_id === $subject->subject_id)
                                                            <?php
                                                            $converted_date = date('m/d/Y',strtotime($schedule->date));
                                                            echo 'value="'.$converted_date.'"'; $update = true;
                                                            ?>
                                                            name="date_{{$subject->subject_id}}_{{$schedule->id}}"
                                                            
                                                            @endif
                                                        @endforeach
                                                        <?php

                                                        // if new subjects have been assigned after some subjects 
                                                        // have been scheduled for exams already
                                                        if (!$update) echo 'name="date_'.$subject->subject_id.'"';
                                                    }else 
                                                    { 
                                                        // if ita an entirely new scheduling
                                                        echo 'name="date_'.$subject->subject_id.'"';
                                                    }
                                                    ?> class="form-control datepicker sandbox-container" id="" placeholder="Enter date">
                                                </div>
                                            </td>
                                            <td style="width:200px;">
                                                <div class="bootstrap-timepicker">
                                           
                                                    <div class="form-group">
                                                        <!--<label>Time picker:</label>-->
                                                       

                                                        <div class="input-group">
                                                            <input type="text" 
                                                            <?php 
                                                    if (isset($schedules) && !empty($schedules)){
                                                        ?>
                                                        <?php $update=false;?>
                                                             @foreach ($schedules as $schedule)
                                                            @if ($schedule->subject_id === $subject->subject_id)
                                                            <?php $update = true;?>
                                                                value="{{$schedule->start_time}}" 
                                                                name="start_time_{{$subject->subject_id}}_{{$schedule->id}}"
                                                            @endif
                                                        @endforeach
                                                        <?php
                                                        // if new subjects have been assigned after some subjects 
                                                        // have been scheduled for exams already
                                                        if (!$update) echo 'name="start_time_'.$subject->subject_id.'"';
                                                    }else { echo 'name="start_time_'.$subject->subject_id.'"';}
                                                    ?>
                                                             class="form-control timepicker">

                                                            <div class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </div>
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <!-- /.form group -->
                                                </div>
                                            </td>
                                            <td style="width:200px;">
                                                <div class="bootstrap-timepicker">
                                                    
                                                    <div class="form-group">

                                                        <div class="input-group">
                                                            <input type="text"
                                                            <?php 
                                                    if (isset($schedules) && !empty($schedules)){
                                                        ?>
                                                            <?php $update=false;?>
                                                            @foreach ($schedules as $schedule)
                                                            @if ($schedule->subject_id === $subject->subject_id)
                                                            <?php $update = true;?>
                                                                value="{{$schedule->end_time}}"
                                                                name="end_time_{{$subject->subject_id}}_{{$schedule->id}}"
                                                            @endif
                                                        @endforeach
                                                        <?php
                                                        // if new subjects have been assigned after some subjects 
                                                        // have been scheduled for exams already
                                                        if (!$update) echo 'name="end_time_'.$subject->subject_id.'"';
                                                    }else { echo 'name="end_time_'.$subject->subject_id.'"';}
                                                    ?> class="form-control timepicker">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </div>
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <!-- /.form group -->
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>

                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary save_form pull-right" name="submit"
                               <?php 
                                                    if (isset($schedules) && !empty($schedules)){
                                                        echo 'value="update_schedule"';
                                                    }else{echo 'value="save_schedule"';;}
                                                        ?>
                             >Submit</button>
                        </form>

                    </div>
                    <!--./end box-body-->
                </div>
                <?php
                    }
                }
                ?>
            </div>

            <!-- right column -->

        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>

@endsection