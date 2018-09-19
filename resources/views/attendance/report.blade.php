<?php
if (isset($edit) && !empty($edit)){
    if ($edit['editmode'] === 'true')
    $editmode = true;
    else
    $editmode = false;
}else {$editmode = false;}
?>

@extends('student.master')

@section('title')
Attendance Report for :
<?php
if ($editmode){
?>
{{$clas->name}} ({{$clas->section}})
<?php
    
}

?> 
@endsection
@section('content')


<div class="content-wrapper" style="min-height: 628px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-calendar-check-o"></i> Attendance <small> </small> </h1>
    </section>
    <section class="content">
        <div class="row">
            @if (session('status'))
                <div class="col-md-12"><div class="alert alert-success">
                    {{ session('status') }}
                </div></div>
            @endif
            
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> Select Criteria</h3>
                    </div>
                    <form id="form1" method="post" accept-charset="utf-8">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="box-body">
                            <input type="hidden" name="ci_csrf_token" value="">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Class</label>
                                        <select id="class_id" name="class_id" class="form-control">
                                            <option value="">Select Class</option>
                                            @foreach($classes as $class)
                                                {
                                                    <option
                                                    <?php
                                                    if ($editmode)
                                                    {
                                                        if($class['id'] === $clas['id'])
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>
                                                     value="{!! $class->id !!}">{!! $class->name !!} - {!! $class->section !!}</option>
                                                }
                                                @endforeach
                                                </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Month</label>
                                        <select id="month" name="month" class="form-control">
                                            <option value="">Select</option>
                                            <option value="01">January</option>
                                                        <option value="02">February</option>
                                                        <option value="03">March</option>
                                                        <option value="04">April</option>
                                                        <option value="05">May</option>
                                                        <option value="06">June</option>
                                                        <option value="07">July</option>
                                                        <option value="08">August</option>
                                                        <option value="09" selected="selected">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                </select>
                                        <span class="text-danger"></span>
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
                    ?>
                <div class="box box-info" id="attendencelist">
                    <div class="box-header with-border">
                        <div class="row">


                            <div class="col-md-4 col-sm-4">
                                <h3 class="box-title"><i class="fa fa-users"></i> Student Attendance Report</h3>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <div class="pull-right">
                                    &nbsp;&nbsp;
                                    <b>
                                                Present: <b class="text text-success">P</b> </b>
                                    &nbsp;&nbsp;
                                    <b>
                                                Late With Excuse: <b class="text text-warning">E</b> </b>
                                    &nbsp;&nbsp;
                                    <b>
                                                Late: <b class="text text-warning">L</b> </b>
                                    &nbsp;&nbsp;
                                    <b>
                                                Absent: <b class="text text-danger">A</b> </b>
                                    &nbsp;&nbsp;
                                    <b>
                                                Holiday: H                                            </b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive">


                        <div class="mailbox-controls">
                            <div class="pull-right">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered table-hover example xyz dataTable no-footer" id="example1">
                                    <thead>
                                        <tr>
                                            <th>Student / Date </th>
                                            <?php
                                            for($i=1;$i<31;$i++)
                                            {
                                                $date = "2017/$request->month/".$i;
                                                $weekday = date('D', strtotime($date));
                                                echo '<th style="width: 18px;">'.$i.' <br>'.$weekday.'</th>';
                                            }
                                            $att = json_decode($att, true);
                                            ?>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        <tr>
                                            <th>{{$student->firstname}} {{$student->lastname}} </th>
                                            <?php
                                            for($i=1;$i<31;$i++)
                                            {
                                                if (strlen($i) === 1) $i = '0'.$i;
                                                
                                                if ((isset($att["$student->id"]["$i"]))) {
                                                    /* ... */
                                                    echo '<th><strong class="text-danger">'.$att["$student->id"]["$i"] .'</strong></th>';
                                                }
                                                else{echo '<th> <span class="text-success">P</span> </th>';}
                                                    
                                            }
                                            ?>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
</div>
</section>
</div>

@endsection