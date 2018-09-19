@extends('student.master')

@section('title')
Class
@endsection
@section('content')

<div class="content-wrapper" style="min-height: 681px;">

    <section class="content-header">
        <h1>
            <i class="fa fa-mortar-board"></i> Academics </h1>
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
            <div class="col-md-4">
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <?php
                    if ($editmode){
                        echo '<h3 class="box-title">Edit Class</h3>';
                    }else{ echo '<h3 class="box-title">Add Class</h3>';}
                    ?>
                    </div>
                    <!-- /.box-header -->
                    <form id="form1" method="post" accept-charset="utf-8">
                        <div class="box-body">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Class</label>
                                <input id="class" name="name" placeholder="" 
                                <?php
                                if ($editmode)
                                {
                                    echo 'value="'.$class['name'].'"';
                                }
                                ?>
                                type="text" class="form-control" value="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sections</label>
                                <div class="radio" style="margin-top: 2px;">
                                            <label><input type="radio" 
                                            <?php
                                            if ($editmode)
                                            {
                                                if($class['section'] === 'A')
                                                echo 'checked="checked"';
                                            }
                                            ?>
                                            name="section" value="A">A</label>
                                            <label><input type="radio" 
                                            <?php
                                            if ($editmode)
                                            {
                                                if($class['section'] === 'B')
                                                echo 'checked="checked"';
                                            } 
                                            ?>
                                            
                                            name="section" value="B">B</label>
                                            <label><input type="radio"
                                            <?php 
                                            if ($editmode)
                                            {
                                                if($class['section'] === 'C')
                                                echo 'checked="checked"';
                                            } 
                                            ?>
                                            
                                            name="section" value="C">C</label>
                                            <label><input type="radio"
                                            <?php 
                                            if ($editmode)
                                            {
                                                if($class['section'] === 'D')
                                                echo 'checked="checked"';
                                            } 
                                            ?>
                                            
                                            name="section" value="D">D</label>
                                </div>

                                <span class="text-danger"></span>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                        <?php
                        if ($editmode){
                            echo '<button type="submit" class="btn btn-success pull-right">Update class</button>';
                        }else{ echo '<button type="submit" class="btn btn-info pull-right">Create class</button>';}
                        ?>
                        </div>
                    </form>
                </div>

            </div>
            <!--/.col (right) -->

            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">Class List</h3>
                        <div class="box-tools pull-right">
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive mailbo-messages">
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-bordered table-hover example dataTable no-footer">
                                        <thead>
                                            <tr role="row">
                                                <th>Class </th>
                                                <th>Sections </th>
                                                <th class="text-right sorting">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($classes as $class)
                                            

                                                <tr role="row" class="odd">
                                                <td class="mailbox-name sorting_1">{!! $class->name !!}</td>
                                                <td>{!! $class->section !!}</td>
                                                <td class="mailbox-date pull-right">
                                                <a href="{!! action('TheClassController@edit', $class->id) !!}" class="btn btn-default btn-xs " data-toggle="tooltip " title="Edit ">
                                                    <i class="fa fa-pencil "></i>
                                                </a>
                                                <a href="{!! action('TheClassController@delete', $class->id) !!}" class="btn btn-default btn-xs " data-toggle="tooltip " title="Delete " onclick="return confirm( 'Are you sure you want to delete this item?'); ">
                                                    <i class="fa fa-remove "></i>
                                                </a>
                                                </td>
                                                </tr>
                                            
                                                @endforeach
                                        </tbody>
                            </table></div></div></div><!-- /.table -->



                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
            </div><!--/.col (left) -->
            <!-- right column -->

        </div>
        <div class="row ">
            <!-- left column -->

            <!-- right column -->
            <div class="col-md-12 ">

            </div><!--/.col (right) -->
</div>
        </div>   <!-- /.row -->
    </section><!-- /.content -->
    @endsection