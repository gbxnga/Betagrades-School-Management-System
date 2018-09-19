@extends('student.master')

@section('title')
IDP | Register Student
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Register Student
            <small>registration</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{action('CalendarController@index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Student Registration</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Student Registration</h3>

                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="register" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="box-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input id="firstname" name="firstname" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Last Name</label>
                                            <input id="lastname" name="lastname" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputFile"> Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="">Select</option>
                                                                                                    <option value="Male">Male</option>
                                                                                                        <option value="Female">Female</option>
                                                                                                </select>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Date Of Birth</label>
                                            <input id="datepicker" name="dob" placeholder="" type="text" class="form-control " value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Admission Year</label>
                                            <input id="admission_date" name="admission_date" placeholder="YYYY/YYYY" type="text" class="form-control" value="<?php echo Config::get('constants.current_session');?>">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Admission Number</label>
                                            <input id="admission_no" name="admission_no" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Class</label>
                                            <select id="class_id" name="class_id" class="form-control">
                                                <option value="">Select</option>
                                                <?php
                                                /*$sql = "SELECT name, id , section FROM classes";
                                                $r2 = mysqli_query($dbc, $sql);
                                                if ($r2){
                                                    while ($row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC)){
                                                        echo '<option value="'.$row2['id'].'">'.$row2['name'].' - '.$row2['section'].'</option>';
                                                    }
                                                }*/
                                                ?>
                                                @foreach($classes as $class)
                                                {
                                                    <option value="{!! $class->id !!}">{!! $class->name !!} - {{$class->section}}</option>
                                                }
                                                @endforeach
                                                </select>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Religion</label>
                                            <input id="religion" name="religion" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mobile Number</label>
                                            <input id="mobileno" name="mobileno" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input id="email" name="email" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-4 col-xs-12">
                                        <label>Student Type</label>
                                        <div class="radio" style="margin-top: 2px;">
                                            <label><input class="radio-inline" type="radio" name="student_type" value="Day">Day</label>
                                            <label><input class="radio-inline" checked="checked" type="radio" name="student_type" value="Boarding">Boarding</label>
                                        </div>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Select Image</label>
                                            <input type="file" name="image" id="file" size="20">
                                        </div>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Current Address</label>
                                            <textarea id="current_address" name="current_address" placeholder="" class="form-control" rows="4"></textarea>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>


                                <h4 class="col-lg-12">Parent/Guardian Details</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Father Name</label>
                                            <input id="father_name" name="father_name" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Father Phone</label>
                                            <input id="father_phone" name="father_phone" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Father Occupation</label>
                                            <input id="father_occupation" name="father_occupation" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mother Name</label>
                                            <input id="mother_name" name="mother_name" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mother Phone</label>
                                            <input id="mother_phone" name="mother_phone" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mother Occupation</label>
                                            <input id="mother_occupation" name="mother_occupation" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>If Guardian Is&nbsp;&nbsp;&nbsp;</label>
                                        <label class="radio-inline">
                                                    <input type="radio" name="guardian_is" value="father"> Father                                                </label>
                                        <label class="radio-inline">
                                                    <input type="radio" name="guardian_is" value="mother"> Mother                                                </label>
                                        <label class="radio-inline">
                                                    <input type="radio" name="guardian_is" value="other" checked> Other                                                </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Guardian Name</label>
                                                    <input id="guardian_name" name="guardian_name" placeholder="" type="text" class="form-control" value="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Guardian Relation</label>
                                                    <input id="guardian_relation" name="guardian_relation" placeholder="" type="text" class="form-control" value="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Guardian Phone</label>
                                                    <input id="guardian_phone" name="guardian_phone" placeholder="" type="text" class="form-control" value="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Guardian Occupation</label>
                                                    <input id="guardian_occupation" name="guardian_occupation" placeholder="" type="text" class="form-control" value="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Guardian Address</label>
                                            <textarea id="guardian_address" name="guardian_address" placeholder="" class="form-control" rows="4"></textarea>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="submit" value="register" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@endsection