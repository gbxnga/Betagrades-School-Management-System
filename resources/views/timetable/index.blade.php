@extends('student.master')

@section('title')
Class
@endsection
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create Timetable
            <small>timetable</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">timetables</li>
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
            <?php
            if (isset($edit) && !empty($edit)){
                $editmode = true;
            }else {$editmode = false;}
            ?>
            <div class="col-xs-12 col-lg-12 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Timetable creation</h3>
                        <a 
                        
                        @if (Auth::guard('teacher')->check())
                        href="/teacher/timetable/create" 
                        @endif
                        @if (Auth::guard('admin')->check())
                        href="/admin/timetable/create" 
                        @endif 
                        
                        class="btn btn-success pull-right">Create Timetable</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
        <form class="search_timetable_form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Class</label>
                            <select id="select_class_id" name="class_id" class="form-control">
                                    <option value="">Select Class</option>
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
                            <span class="class_id_error text-danger"></span>
                        </div>
                        <button type="submit" id="search_filter" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle"><i class="fa fa-search"></i> View Timetable</button>
            
                    </div>
                    
                </div>
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