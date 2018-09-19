@extends('student.master')

@section('title')
School Information
@endsection
@section('content')


<div class="content-wrapper" style="min-height: 634px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-gears"></i> School Information</h1>
    </section>
    <!-- Main content -->
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
                        <h3 class="box-title"><i class="fa fa-gear"></i> General Settings</h3>
                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                 </div>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        @if (count($info) !== 1)
                        <br/><div class="col-md-12"><div class="alert alert-danger">No Information for school yet</div>
                        <a href="{{action('SchoolInformation@create')}}" class="btn btn-primary btn-sm">Add information</a>
                        </div>
                        @else
                        <div class="mailbox-controls">
                        </div>
                        <div class="row" style="padding: 5px;">
                            <div class="col-md-3">
                                <img src="https://demo.smart-school.in/uploads/school_content/logo/1.png" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                                <br>
                                <br>
                                <a class="btn btn-sm btn-primary col-md-offset-4" href=""><i class="fa fa-picture-o"></i> Edit Logo</a>
                                <br>
                                <br>
                            </div>
                            <div class="col-md-9">
                                <div class="table-responsive mailbox-messages">
                                    <table class="table table-hover table-striped">
                                        <?php $info = json_decode($info,true);//print_r($info);var_dump($info);exit();?>
                                        <tbody>
                                            <?php

                                            foreach ($info as $inf)
                                            {
                                                $idd = $inf["id"];

                                            ?>

                                            <tr>
                                                <td>School Name</td>
                                                <td class="mailbox-name"><?php echo $inf["school_name"];?></td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td class="mailbox-name">{{$inf['address']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td class="mailbox-name">{{$inf['phone']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td class="mailbox-name">{{$inf['email']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Session</td>
                                                <td class="mailbox-name">{{$inf['session']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Term</td>
                                                <td class="mailbox-name">{{$inf['term']}}</td>
                                            </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="box-footer">
                        <div class="mailbox-controls">
                            <a href="{{action('SchoolInformationController@edit_form', $idd)}}" class="btn btn-primary btn-sm  pull-right" data-toggle="tooltip" title="Edit Info"><i class="fa fa-pencil"></i> Edit</a>
                           
                        </div>
                    </div>
                </div>
                 @endif
            </div>
        </div>
    </section>
</div>

@endsection