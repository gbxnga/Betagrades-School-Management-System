@extends('student.master')

@section('title')
Class
@endsection
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-calendar-check-o"></i> Attendance <small></small> </h1>
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
                if ($edit['editmode'] === 'true')
                $editmode = true;
                else
                $editmode = false;
            }else {$editmode = false;}
            ?>
            <div class="col-md-12">
                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> Select Criteria</h3>
                    </div>
                    <form id="form1" method="post" accept-charset="utf-8">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="box-body">
                            <div class="row">
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
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label>Attendance Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text"
                                        <?php
                                            if ($editmode)
                                            {
                                                echo 'value="'.$request->date. '"';
                                            }
                                        ?>
                                         name="date" class="form-control pull-right" id="datepicker">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="search" value="search" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-search"></i> Search</button>
                        </div>
                    </form>
                </div>
                <?php
                if ($editmode){

                    if(isset($attendances) && !empty($attendances) && (count($attendances)>0))
                    {
                        echo '<div class="alert alert-success">Attendance on this date for this class is already taken</div>';
                        
                    }
                    else
                    {

                    

                ?>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-users"></i> Student List for <?= $clas['name'].' '.$clas['section'];?></h3>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="box-body">
                        <form 
                         @if (Auth::guard('teacher')->check())
                            action="{{route('teacher.attendance.save')}}"
                            @elseif (Auth::guard('admin')->check())
                            action="{{route('admin.attendance.save')}}"
                        @endif
                        method="post">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="mailbox-controls">
                                <span class="button-checkbox">
                                            <!--<button type="button" class="btn btn-sm btn-primary" data-color="primary"><i class="state-icon glyphicon glyphicon-unchecked"></i>&nbsp;Mark As Holiday</button>-->
                                            <input type="checkbox" class="hidden" name="holiday" value="checked">
                                        </span>
                                <div class="pull-right">
                                    <button type="submit" name="search" value="saveattendence" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-save"></i> Save Attendance </button>
                                </div>
                            </div>
                            <input style="display:none" type="text"
                                        <?php
                                            if ($editmode)
                                            {
                                                echo 'value="'.$request->date. '"';
                                            }
                                        ?>
                                         name="date" hidden="hidden" class="form-control pull-right" >
                                         <input hidden="hidden" type="text" name="class_id" value="<?= $request->class_id;?>">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Admission Number</th>
                                        <th>Name</th>
                                        <th class="">Attendance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                    <tr>
                                        <td> 1 </td>
                                        <td>{{$student->admission_no}}</td>

                                        <td>{{$student->firstname}} {{$student->lastname}}</td>
                                        <td>
                                            <div class="radio radio-info radio-inline">
                                                <input checked="" type="radio" id="{{$student->id}}-0" value="P" name="{{$student->id}}_V">
                                                <label for="{{$student->id}}-0"> 
                                                                            Present 
                                                                        </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="{{$student->id}}-1" value="LE" name="{{$student->id}}_V">
                                                <label for="{{$student->id}}-1"> 
                                                                            Late With Excuse 
                                                                        </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="{{$student->id}}-2" value="L" name="{{$student->id}}_V">
                                                <label for="{{$student->id}}-2"> 
                                                                            Late 
                                                                        </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="{{$student->id}}-3" value="A" name="{{$student->id}}_V">
                                                <label for="{{$student->id}}-3"> 
                                                                            Absent 
                                                                        </label>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>

                <?php
                    }// end if attendances
                }
                ?>
            </div>
        </div>
    </section>
</div>

@endsection