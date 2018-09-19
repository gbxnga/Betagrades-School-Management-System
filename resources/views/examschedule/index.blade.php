@extends('student.master')

@section('title')
Class
@endsection
@section('content')
<?php
            if (isset($edit) && !empty($edit)){
                if ($edit['editmode'] === 'true')
                $editmode = true;
                else
                $editmode = false;
            }else {$editmode = false;}
            ?>

<!-- /.modal -->
<?php
if ($editmode){
?>
<?php
if (count($EXAMS)>0){
?>

<div class="modal fade" id="modal-exam">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#337ab7; color:white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><strong>FINAL EXAMINATION</strong></h4>
            </div>
            <div class="modal-body">
    <div class="table-responsive">
        <p class="lead titlefix pt0"><?= $clas['name']. ' ' . $clas['section'] ?></p>
        <div id="DataTables_Table_5_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-hover dataTable no-footer example1" id="">
                        <thead>
                            <tr role="row">
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($EXAMS as $exam)
                            <tr role="row" class="odd">
                                <td  style="width:200px;" class="sorting_1">{{$exam->subject}}</td>
                                <td class="">{{$exam->date}}</td>
                                <td class="text text-center">{{$exam->start_time}}</td>
                                <td class="text text-center">{{$exam->end_time}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
             <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
} // edn if ca2
?>
<?php
if (count($CA2S)>0){
?>

<div class="modal fade" id="modal-ca2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#337ab7; color:white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><strong>CONTINOUS ASSESSMENT 2</strong></h4>
            </div>
            <div class="modal-body">
    <div class="table-responsive">
        <p class="lead titlefix pt0"><?= $clas['name']. ' ' . $clas['section'] ?></p>
        <div id="DataTables_Table_5_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-hover dataTable no-footer example1" id="">
                        <thead>
                            <tr role="row">
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($CA2S as $ca2)
                            <tr role="row" class="odd">
                                <td  style="width:200px;" class="sorting_1">{{$ca2->subject}}</td>
                                <td class="">{{$ca2->date}}</td>
                                <td class="text text-center">{{$ca2->start_time}}</td>
                                <td class="text text-center">{{$ca2->end_time}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
             <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
} // edn if ca2
?>
<?php
if (count($CA1S)>0){
?>

<div class="modal fade" id="modal-ca1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#337ab7; color:white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><strong>CONTINOUS ASSESSMENT 1</strong></h4>
            </div>
            <div class="modal-body">
    <div class="table-responsive">
        <p class="lead titlefix pt0"><?= $clas['name']. ' ' . $clas['section'] ?></p>
        <div id="DataTables_Table_5_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-hover dataTable no-footer example1" id="">
                        <thead>
                            <tr role="row">
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($CA1S as $ca1)
                            <tr role="row" class="odd">
                                <td  style="width:200px;" class="sorting_1">{{$ca1->subject}}</td>
                                <td class="">{{$ca1->date}}</td>
                                <td class="text text-center">{{$ca1->start_time}}</td>
                                <td class="text text-center">{{$ca1->end_time}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
             <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
} // edn if ca1
?>
<?php
}
?>
<div class="content-wrapper" style="min-height: 681px;">

    <section class="content-header">
        <h1>
            <i class="fa fa-map-o"></i> Examinations <small></small> </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            @if (session('status'))
                <div class="col-md-12"><div class="alert alert-success">
                    {{ session('status') }}
                </div></div>
            @endif
            
            <!-- left column -->
            <!-- Large modal -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> Select Criteria</h3>
                        <div class="box-tools pull-right">
                            <a 
                            @if (Auth::guard('teacher')->check())
                            href="{{route('teacher.schedule.create')}}"
                            @elseif (Auth::guard('admin')->check())
                            href="{{route('admin.schedule.create')}}"
                        @endif
                            
                            class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>
                        </div>
                    </div>
                    <form method="post" accept-charset="utf-8">
                        <div class="box-body">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="row">
                                <div class="col-md-6">
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
                            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-search"></i> Search</button>
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
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"><i class="fa fa-list"></i> Exam List </h3>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="box-body table-responsiv">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Exam</th>
                                        <th class="pull-right ">Action</th>
                                        </tr>
                                    </thead>    
                                    <tbody>

                                    <tr>
                                         <td >1.</td>
                                         <td style="width:70%">CA 1</td>
                                        <td class="pull-right ">
                                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-ca1">
                                                <i class="fa fa-calendar-times-o "></i> View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                         <td>2.</td>
                                         <td style="width:70%">CA 2</td>
                                        <td class="pull-right ">
                                            <a class="btn btn-primary btn-sm " data-toggle="modal" data-target="#modal-ca2">
                                                <i class="fa fa-calendar-times-o "></i> View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                         <td>3.</td>
                                         <td style="width:70%">EXAM</td>
                                        <td class="pull-right ">
                                            <a class="btn btn-primary btn-sm " data-toggle="modal" data-target="#modal-exam">
                                                <i class="fa fa-calendar-times-o "></i> View</a>
                                        </td>
                                    </tr>
                                    
                                    </tbody>
                                </table>
                                </div>
                                </div>
                                </div>
                        </div><!--./end box-body-->
                    </div>
                    <?php
                    }
                }
                ?>
                </div>

                <!-- right column -->

            </div>   <!-- /.row -->
            
    </section><!-- /.content -->
</div>

@endsection