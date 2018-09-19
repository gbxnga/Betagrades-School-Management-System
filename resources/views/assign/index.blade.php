@extends('student.master')

@section('title')
Assign Teacher/Subject
@endsection
@section('content')

<div class="content-wrapper" style="min-height: 681px;">

    <section class="content-header">
        <h1>
            <i class="fa fa-mortar-board"></i> Academics </h1>
    </section>


<section class="content">
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
    <div class="box box-primary">
            
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-search"></i> Select Criteria</h3>
        </div>
        <form class="assign_teacher_form" method="post" enctype="multipart/form-data">
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
                    </div>
                    
                </div>
                </div>
                <div class="box-footer">
                    <button type="submit" id="search_filter" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right"><i class="fa fa-search"></i> Search</button>
            </div>
        </form>
    </div>
    </div>
    <?php
    if ($editmode){
        ?>
    <div class="row">
    <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Select Teacher and Subject</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Class</label>

                  <div class="col-sm-10">
                    <select class="form-control" readonly="readonly" name="class_id">
                                    
                        <option value="<?= $clas['id'];?>"><?= $clas['name'] . $clas['section'];?></option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Subject</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="subject_id">
                        @foreach($subjects as $subject)
                                    
                                        <option value="{!! $subject->id !!}">{!! $subject->name !!}</option>
                                    
                        @endforeach
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Teacher</label>

                  
                  <div class="col-sm-10">
                    <select class="form-control" name="teacher_id">
                        @foreach($teachers as $teacher)
                                    
                                        <option value="{!! $teacher->id !!}">{!! $teacher->name !!}</option>
                                    
                        @endforeach
                  </select>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Assign</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          
          <!-- /.box -->
    </div>

    <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Assigned Subjects to Teachers</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody><tr>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                            @foreach($assigns as $assign)
                                    
                            <tr>
                                <td>{!! $assign->s_name !!}</td>
                                <td><a href="{!! action('TeacherController@show', $assign->t_id) !!}">{!! $assign->t_name !!}</a></td>
                                <td><a href="{!! action('AssignController@delete', $assign->id) !!}" onclick="return confirm( 'Are you sure you want to delete this item?'); " class="btn-md btn btn-danger" data-toggle="moda" data-target="#modal-dange">
                                                DELETE
                                        </a></td>
                            </tr>
                            @endforeach
                            
                        </tbody></table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
    </div>
    </div>
    <?php
    }
    ?>






</section>

            </div>   <!-- /.row -->
    </section><!-- /.content -->
    @endsection