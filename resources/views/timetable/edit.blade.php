@extends('student.master')

@section('title')
Editting Timetable for <?= $clas['name'].' ' .$clas['section'];?>
@endsection
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Timetable
            <small>timetable</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit timetable</li>
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
            <div class="col-xs-12 col-lg-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editing Timetable for {!! $clas->name !!} - {!! $clas->section !!}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="table-responsive">
                                <table class="table table-hover table-striped">


                        <form id="form1" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"> 
                            <input type="hidden" name="class_id" value="{!! $clas->id !!}"> 
                            <?php
                            $timetables = json_decode($timetables, true);
                            $subjects = json_decode($subjects, true);
                            
                            ?>
                            <tbody><tr>
                                <th>Day</th>
                                <th>Period 1<br><span style="color:#cccccc;">8-9</span></th>
                                <th>Period 2<br><span style="color:#cccccc;">9-10</span></th>
                                <th>Period 3<br><span style="color:#cccccc;">10-11</span></th>
                                <th>Period 4<br><span style="color:#cccccc;">11-12</span></th>
                                <th>Period 5<br><span style="color:#cccccc;">12-1</span></th>
                                <th>Period 6<br><span style="color:#cccccc;">1-2</span></th>
                                <th>Period 7<br><span style="color:#cccccc;">1-3</span></th>
                                <th>Period 8<br><span style="color:#cccccc;">3-4</span></th>
                            </tr>
                            <?php
                            for($i=0;$i<5;$i++)

                            {
                                echo '<tr>';
                                if ($i === 0) $d = 'mon';
                                elseif ($i === 1) $d = 'tue';
                                elseif ($i === 2) $d = 'wed';
                                elseif ($i === 3) $d = 'thu';
                                elseif ($i === 4) $d = 'fri';

                                echo '<td>'.strtoupper($d).'</td>';
                                //loop 8 times for periods
                                for($y=1;$y<9;$y++)

                                {
                                    echo '<td>';
                                    echo '<select name="'.$d.'_'.$y.'" class="form-control select2" style="width: 100%;">';
                                    echo '<option>None</option>';
                                    foreach($subjects as $subject)
                                    {      
                                                                                  
                                            echo '<option ';
                                            

                                            if ($timetables[$i]["P$y"] === $subject['name'])
                                            echo 'selected=selected ';
                                            
                                            
                                            echo ' value="'.$subject['name'].'">'.$subject['name'].'</option>';
                                                
                                    }
                                    echo '</select>';
                                    echo '</td>';
                                }
                                echo '</td>';
                            }
                            ?>
                        </tbody>
                        
                        </table>
                        </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save and Submit</button>
                        </div>
                    </form>
                    
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
</section>
@endsection