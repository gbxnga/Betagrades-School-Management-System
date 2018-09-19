@extends('student.master')

@section('title')
Edit School Information
@endsection
@section('content')


<div class="content-wrapper" style="min-height: 634px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-gears"></i> System Settings <small></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">School Information</h3>
                    </div>
                    <form   accept-charset="utf-8" class="form-horizontal form-label-left" method="post">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="box-body">
                            <?php $info = json_decode($info,true);//print_r($info);var_dump($info);exit();?>
                             <?php
                             

                            foreach ($info as $inf)
                            {

                            ?>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="exampleInputEmail1">School Name</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" id="name" name="name" placeholder="" type="text" value="{{$inf['school_name']}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="exampleInputEmail1">Address</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="form-control col-md-7 col-xs-12" rows="3" id="address" name="address" placeholder="">{{$inf['address']}}</textarea>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="exampleInputEmail1">Phone</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" id="phone" name="phone" placeholder="" type="text" value="{{$inf['phone']}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="exampleInputEmail1">Email</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" id="email" name="email" placeholder="" type="text" value="{{$inf['email']}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="exampleInputEmail1">Session</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="session_id" name="session" class="form-control col-md-7 col-xs-12">
                                        <option value="">Select</option>
                                        <option
                                        <?php
                                        if ($inf['session']==='2017-18') echo 'selected="selected" ';
                                        ?>
                                         value="2017-18" >2017-18</option>
                                                    <option
                                                    <?php
                                        if ($inf['session']==='2018-19') echo 'selected="selected" ';
                                        ?>
                                                     value="2018-19">2018-19</option>
                                                    <option
                                                    <?php
                                        if ($inf['session']==='2019-20') echo 'selected="selected" ';
                                        ?>
                                                     value="2019-20">2019-20</option>
                                                    <option
                                                    <?php
                                        if ($inf['session']==='2020-21') echo 'selected="selected" ';
                                        ?>
                                                     value="2020-21">2020-21</option>
                                                    <option
                                                    <?php
                                        if ($inf['session']==='2021-22') echo 'selected="selected" ';
                                        ?>
                                                     value="2021-22">2021-22</option>
                                            </select>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="exampleInputEmail1">Term</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="" name="term" class="form-control col-md-7 col-xs-12">
                                        <option value="">Select</option>
                                        <option
                                        <?php
                                        if ($inf['term']==='1') echo 'selected="selected" ';
                                        ?>
                                         value="1">FirstTerm</option>
                                        <option
                                        <?php
                                        if ($inf['term']==='2') echo 'selected="selected" ';
                                        ?>
                                         value="2">SecondTerm</option>
                                        <option
                                        <?php
                                        if ($inf['term']==='3') echo 'selected="selected" ';
                                        ?>
                                         value="3">ThirdTerm</option>
                                    </select>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-info pull-center">Save</button> </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection