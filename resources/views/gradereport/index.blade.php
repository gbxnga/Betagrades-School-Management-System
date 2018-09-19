@extends('student.master')
 <?php
            if (isset($edit) && !empty($edit)){
                if ($edit['editmode'] === 'true')
                $editmode = true;
                else
                $editmode = false;
            }else {$editmode = false;}
            ?>
@section('title')

@endsection
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Results
            <small>Generate results</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Results</li>
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
            <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">GENERATE RESULTS</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form"
                    @if (Auth::guard('teacher')->check())
                                         action="{{route('teacher.report.list')}}"
                                    @elseif (Auth::guard('admin')->check())
                                        action="{{route('admin.report.list')}}"
                                    @endif method="post">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Class</label>
                                <select class="form-control select2" name="class_id" style="width: 100%;">
                                    <option value="">Select Class</option>
                                     @foreach($classes as $class)
                                                
                                        <option value="{!! $class->id !!}">{!! $class->name !!} - {{$class->section}}</option>
                                                
                                            @endforeach
                                    </select>
                            </div>
                            <!-- /.form-group -->
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary center-block">GENERATE RESULT</button>
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

@endsection