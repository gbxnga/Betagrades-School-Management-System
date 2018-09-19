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

                    if (count($schedules)<1)
                    {
                        echo '<div class="alert alert-danger">There are no scheduled exams for this class</div>';
                    }
                    else
                    {

                ?>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-list"></i>Record Marks</h3>
                        <br/>
                        <?php 
                        if (isset($marks) && !empty($marks)){
                            echo '<div class="alert alert-success">Student marks for this exam in this class are already recorded. You are now editing them</div>';
                        }
                        ?>

                    </div>
                    <div class="box-body">
                        <form role="form" class="addschedule-form"
                        <?php 
                        if (isset($marks) && !empty($marks)){
                        ?>
                        @if (Auth::guard('teacher')->check())
                            action="{{route('teacher.mark.update')}}"
                            @elseif (Auth::guard('admin')->check())
                            action="{{route('admin.mark.update')}}"
                        @endif
                        <?php
                        }else{
                        ?>
                        @if (Auth::guard('teacher')->check())
                            action="{{route('teacher.mark.save')}}"
                            @elseif (Auth::guard('admin')->check())
                            action="{{route('admin.mark.save')}}"
                        @endif
                        <?php
                        }
                        ?> method="post" novalidate="novalidate">
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
                                            <th>Admission No </th>
                                            <th> Student </th>
                                            @foreach ($subjects as $subject)
                                                @foreach ($schedules as $schedule)
                                                    @if ($schedule->subject_id === $subject->subject_id)
                                                        <th> {{$subject->subject}} </th>
                                                    @endif
                                                @endforeach
                                            
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        <tr>
                                            <td>
                                                <div class="form-group">{{$student->admission_no}} </div>
                                            </td>
                                             <td>
                                                <div class="form-group">{{$student->name}} </div>
                                            </td>
                                            @foreach ($subjects as $subject)
                                                @foreach ($schedules as $schedule)
                                                    @if ($schedule->subject_id === $subject->subject_id)
                                                        <td>
                                                            <div class="form-group">
                                                                <?php
                                                                if (isset($marks) && !empty($marks)){
                                                                    ?>
                                                                    <?php $update=false;?>
                                                                    @foreach ($marks as $mark)
                                                                    @if (($schedule->id === $mark->sch_id) && ($student->id === $mark->s_id) )
                                                                    <?php $update = true;?>
                                                                        <input type="text" name="mark_{{$schedule->id}}_{{$student->id}}_{{$mark->m_id}}" class="form-control sandbox-container" id="" value="{{$mark->mark}}" placeholder="Enter Mark">
                                                                    @endif
                                                                    @endforeach
                                                                <?php
                                                                // if new subjects have been assigned after some subjects 
                                                                // have been scheduled for exams already
                                                                if (!$update) echo '<input type="text" name="mark_'.$schedule->id.'_'.$student->id.'" class="form-control sandbox-container" id="" value="0.00" placeholder="Enter Mark">';
                                                                } // end if isset marks 
                                                                else{ 
                                                                ?>
                                                                    <input type="text" name="mark_{{$schedule->id}}_{{$student->id}}" class="form-control sandbox-container" id="" value="0.00" placeholder="Enter Mark">
                                                                <?php 
                                                                } // end else
                                                                ?>
                                                                
                                                            </div>
                                                        </td>
                                                    @endif
                                                @endforeach
                                            
                                            @endforeach
                                            
                                            
                                            
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>

                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary save_form pull-right" name="submit">Submit</button>
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