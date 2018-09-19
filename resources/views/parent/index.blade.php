@extends('parent.master')

@section('title')
Ward's Profile
@endsection
@section('content')



<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username">{{$student->firstname}} -  {{$student->lastname}} </h3>
                    <h5 class="widget-user-desc">Student</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="dist/img/user1-128x128.jpg" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 col-xs-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{$clas->name}} - {{$clas->section}}</h5>
                                <span class="description-text">CLASS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 col-xs-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{$student->gender}}</h5>
                                <span class="description-text">GENDER</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">{{$student->date_of_birth}}</h5>
                                <span class="description-text">AGE</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
<table class="table table-hover table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-5">Admission Date</td>
                                            <td class="col-md-5">
                                                {{$student->admission_date}}</td>
                                        </tr>
                                        <tr>
                                            <td>Date Of Birth</td>
                                            <td>{{$student->date_of_birth}} </td>
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td>
                                                General
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mobile Number</td>
                                            <td>{{$student->mobileno}}</td>
                                        </tr>
                                        <tr>
                                            <td>Religion</td>
                                            <td>{{$student->religion}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$student->email}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                                        <h3>Address </h3>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-5">Current Address</td>
                                            <td class="col-md-5">{{$student->current_address}}</td>
                                        </tr>
                                        <tr>
                                            <td>Permanent Address</td>
                                            <td>{{$student->current_address}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                                            <h3>Parent / Guardian Details </h3>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-5">Father Name</td>
                                            <td class="col-md-5">{{$student->father_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Father Phone</td>
                                            <td>{{$student->father_phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Father Occupation</td>
                                            <td>{{$student->father_occupation}}</td>
                                        </tr>
                                        <tr>
                                            <td>Mother Name</td>
                                            <td>{{$student->mother_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Mother Phone</td>
                                            <td>{{$student->mother_phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Mother Occupation</td>
                                            <td>{{$student->mother_occupation}}</td>
                                        </tr>
                                        <tr>
                                            <td>Guardian Name</td>
                                            <td>{{$student->guardian_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Guardian Relation</td>
                                            <td>{{$student->guardian_relation}}</td>
                                        </tr>
                                        <tr>
                                            <td>Guardian Phone</td>
                                            <td>{{$student->guardian_phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Guardian Occupation</td>
                                            <td>{{$student->guardian_occupation}}</td>
                                        </tr>
                                        <tr>
                                            <td>Guardian Address</td>
                                            <td>{{$student->guardian_address}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
    </div>
</section>
@endsection