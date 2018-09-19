@extends('student.master')

@section('title')

@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Entering results for {{$student->firstname}} {{$student->lastname}}
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">List of Class</li>
        </ol>
    </section>
    <div class="modal fade" id="modal-assign-subject">
        <div class="modal-dialog">
            <div class="modal-content">
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
    <div class="modal modal-danger fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">WARNING</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline">DELETE CLASS</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content" style="height:400px">
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
            <div class="col-xs-12 col-lg-6 ">

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">ACADEMIC GRADES</h3>
                    </div>
                    <!-- /.box-header -->
                    <form method="post"
                    @if (Auth::guard('teacher')->check())
                            action="{{route('teacher.report.student.submit', $student->id)}}"
                            @elseif (Auth::guard('admin')->check())
                            action="{{route('admin.report.student.submit', $student->id)}}"
                        @endif>
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input hidden="hidden" type="text" name="student_id" value="{{$student->id}}">
                    <div class="box-body">
                        <table style="width:100%"  id="" class="table table-hover dataTable no-footer example1">
                            <thead>
                                <tr>
                                    <th colspan="">Subject</th>
                                    <th colspan="">CA 1</th>
                                    <th colspan="">CA 2</th>
                                    <th colspan="">Exam</th>
                                    <th colspan="">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php //print_r($subjects);exit(); ?>
                                @foreach ($subjects as $subject)
                                <tr>
                                    <?php $total =0;?>
                                    <td>
                                        {{$subject->subject}}
                                    </td>
                                    
                                    @foreach ($marks as $mark)
                                    <?php $value =false;?>
                                    
                                        @if ($mark->SUBJECT_ID === $subject->subject_id && $mark->exam === 'EXAM')
                                        <td>{{$mark->SCORE}} <input type="text" name="{{$mark->SUBJECT_ID}}_EXAM" value="{{$mark->SCORE}}" hidden="hidden"></td>
                                        <?php $total =intval($total) + intval($mark->SCORE);?>
                                        <?php $value =true;?>
                                        
                                        @elseif ($mark->SUBJECT_ID === $subject->subject_id  && $mark->exam === 'CA 2')
                                        <td>{{$mark->SCORE}} <input type="text" name="{{$mark->SUBJECT_ID}}_CA2" value="{{$mark->SCORE}}" hidden="hidden"></td>
                                        <?php $total =intval($total) + intval($mark->SCORE);?>
                                        <?php $value =true;?>
                                        @elseif ($mark->SUBJECT_ID === $subject->subject_id && $mark->exam === 'CA 1')
                                        <td>{{$mark->SCORE}} <input type="text" name="{{$mark->SUBJECT_ID}}_CA1" value="{{$mark->SCORE}}" hidden="hidden"></td>
                                        <?php $total =intval($total) + intval($mark->SCORE);?>
                                        <?php $value =true;?>
                                
                                        @endif
                                    
                                    @endforeach
                                    <?php //if(!$value) echo '<td></td>';?>
                                    
                                    <td><?= $total;?> <input type="text" name="{{$mark->SUBJECT_ID}}_TOTAL" value="<?= $total;?>" hidden="hidden"></td> 
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-xs-12 col-lg-6 ">

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">BEHAVIOURAL GRADES</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="" class="table table-hover dataTable no-footer">
                            <thead>
                                <tr>
                                    <th colspan="1">Domain table</th>
                                    <th colspan="5">Select</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h5>PSYCHOMOTO DOMAIN</h5>
                                    </td>
                                </tr>
                                <tr>

                                    <td>
                                        Attentiveness
                                    </td>
                                    <td><select name="attentiveness" class="form-control select2" style="width: 100%;">
                                    <option value="5">5. Excellent</option>
                                    <option value="4">4. Very good</option>
                                    <option value="3">3. Good</option>
                                    <option value="2">2. Satidfactory</option>
                                    <option value="1">1. Fair</option>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>AFFECTIVE DOMAIN</h5>
                                    </td>
                                </tr>
                                <tr>

                                    <td>
                                        Punctuality
                                    </td>
                                    <td><select name="punctuality" class="form-control select2" style="width: 100%;">
                                    <option value="5">5. Excellent</option>
                                    <option value="4">4. Very good</option>
                                    <option value="3">3. Good</option>
                                    <option value="2">2. Satidfactory</option>
                                    <option value="1">1. Fair</option>
                                    </select></td>
                                </tr>
                                <tr>

                                    <td>
                                        Leadership
                                    </td>
                                    <td><select name="leadership" class="form-control select2" style="width: 100%;">
                                    <option value="5">5. Excellent</option>
                                    <option value="4">4. Very good</option>
                                    <option value="3">3. Good</option>
                                    <option value="2">2. Satidfactory</option>
                                    <option value="1">1. Fair</option>
                                    </select></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-xs-12 col-lg-6 ">

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">COMMENTS & REMARKS</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <!--<tr>
                                    <th colspan="1">Domain table</th>
                                    <th colspan="5">Select</th>
                                </tr>-->
                            </thead>
                            <tbody>
                                <tr>

                                    <td>
                                        Class Teacher
                                    </td>
                                    <td><textarea name="class_teacher_remark" class="form-control"></textarea></td>
                                </tr>
                                <tr>

                                    <td>
                                        House Master
                                    </td>
                                    <td><textarea name="house_master_remark" class="form-control"></textarea></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-lg-12"><button type="submit" class="btn btn-primary center-block">SAVE AND SUBMIT</button></div>
        </div>
        </form>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@endsection