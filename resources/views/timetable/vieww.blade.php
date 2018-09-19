@extends('student.master')

@section('title')
Class
@endsection
@section('content')


<div class="content-wrapper" style="min-height: 599px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Classes
            <small>Create Class</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Create Class</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Creating Timetable for {!! $clas->name !!} - {!! $clas->section !!}</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="table-responsive">
                                <table class="table table-hover table-striped">

<!--<table class="table table-bordered">-->
                        <form id="form1" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"> 
                            <input type="hidden" name="class_id" value="{!! $clas->id !!}"> 
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
                            <tr>
                                <td>
                                    Mon
                                </td>
                                <td>
                                    <select name="mon_1" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="mon_2" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="mon_3" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="mon_4" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="mon_5" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="mon_6" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="mon_7" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="mon_8" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tue
                                </td>
                                <td>
                                    <select name="tue_1" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="tue_2" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="tue_3" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="tue_4" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="tue_5" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="tue_6" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="tue_7" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="tue_8" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Wed
                                </td>
                                <td>
                                    <select name="wed_1" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="wed_2" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="wed_3" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="wed_4" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="wed_5" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="wed_6" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="wed_7" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="wed_8" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Thu
                                </td>
                                <td>
                                    <select name="thu_1" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="thu_2" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="thu_3" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="thu_4" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="thu_5" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="thu_6" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="thu_7" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="thu_8" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Fri
                                </td>
                                <td>
                                    <select name="fri_1" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="fri_2" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="fri_3" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="fri_4" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="fri_5" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="fri_6" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="fri_7" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="fri_8" class="form-control select2" style="width: 100%;">
                                    <option>None</option>
                                    @foreach($subjects as $subject)
                                                
                                            <option value="{!! $subject->name !!}">{!! $subject->name !!}</option>
                                                
                                    @endforeach
                                    </select>
                                </td>
                            </tr>
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