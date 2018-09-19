<?php
    if (isset($edit) && !empty($edit)){
        $editmode = true;
    }else {$editmode = false;}
?>

@extends('student.master')

@section('title')
<?php
if($editmode)
 
echo 'Edit Teacher : '.$teacher->name;
else{
?>
Teachers
<?php
}
?>
@endsection
@section('content')

<div class="content-wrapper" style="min-height: 681px;">

    <section class="content-header">
        <h1>
            <i class="fa fa-mortar-board"></i> Academics </h1>
    </section>


<section class="content">
        <div class="row">
        <div class="col-md-12">
        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
        @endif 
        @if (count($errors) > 0) 
        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach 
        @endif
       
                    </div>    
            <div class="col-md-5">           
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <?php
                    if ($editmode){
                        echo '<h3 class="box-title">Edit Teacher</h3>';
                    }else{ echo '<h3 class="box-title">Register Teacher</h3>';}
                    ?>
                    </div> 
                    <form id="form1" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="box-body">
                              <input type="hidden" name="_token" value="{!! csrf_token() !!}">      
                                                         <div class="form-group">
                                <label for="exampleInputEmail1">FullName</label>
                                <input id="category" name="name"
                                <?php
                                if ($editmode)
                                {
                                    echo 'value="'.$teacher['name'].'"';
                                }
                                ?>
                                 placeholder="" type="text" class="form-control">
                                <span class="text-danger"></span>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input id="" name="username"
                                <?php
                                if ($editmode)
                                {
                                    echo 'value="'.$teacher['username'].'"';
                                }
                                ?>
                                 placeholder="" type="text" class="form-control">
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input id="category" name="email"
                                <?php
                                if ($editmode)
                                {
                                    echo 'value="'.$teacher['email'].'"';
                                }
                                ?>
                                 placeholder="" type="text" class="form-control">
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile"> Gender &nbsp;&nbsp;</label>
                                <select class="form-control" name="sex">
                                    <option value="">Select</option>
                                            <option
                                            <?php 
                                            if ($editmode)
                                            {
                                                if($teacher['sex'] === 'Male')
                                                echo 'selected="selected"';
                                            } 
                                            ?>
                                            value="Male">Male</option>
                                            <option
                                            <?php 
                                            if ($editmode)
                                            {
                                                
                                                if($teacher['sex'] === 'Female')
                                                echo 'selected="selected"';
                                            } 
                                            ?>
                                             value="Female">Female</option>
                                    </select>
                                <span class="text-danger"></span>
                            </div>
                            <!--<div class="form-group">
                                <label for="exampleInputEmail1">Date Of Birth</label>
                                <input id="dob" name="dob"
                                <?php
                                if ($editmode)
                                {
                                    //echo 'value="'.$teacher['dob'].'"';
                                }
                                ?>
                                 placeholder="" type="text" class="form-control" value="" readonly="readonly">
                                <span class="text-danger"></span>
                            </div>-->
                             <?php
                                if (!($editmode))
                                {
                                ?>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input id="password" name="password" placeholder="" type="text" class="form-control">
                                <span class="text-danger"></span>
                            </div>
                                <?php
                                }
                                ?>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <textarea id="address" name="address" placeholder="" class="form-control">
                                <?php
                                if ($editmode)
                                {
                                    echo $teacher['address'];
                                }
                                ?>
                                </textarea>
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input id="phone" name="phone"
                                <?php
                                if ($editmode)
                                {
                                    echo 'value="'.$teacher['phone'].'"';
                                }
                                ?>
                                 placeholder="" type="text" class="form-control">
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                            <label for="exampleInputEmail1">Class Teacher For: </label>
                                            <select id="class_id" name="class_id" class="form-control">
                                                <option value="">Select Class</option>
                                                <?php
                                                ?>
                                                @foreach($classes as $class)
                                                {
                                                    <option 
                                                    <?php
                                                    if ($editmode){
                                                        if ($teacher['class_id'] === $class->id)
                                                            echo 'selected="selected"';
                                                    }
                                                    ?>
                                                    value="{!! $class->id !!}">{!! $class->name !!} - {{$class->section}}</option>
                                                }
                                                @endforeach
                                                </select>
                                            <span class="text-danger"></span>
                                        </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Teacher Photo (150px X 150px)</label>
                                <?php
                                                    if (!empty($teacher->photo)&&($editmode)){
                                                        ?>
                                <img src="{{url('/images/')}}/{{$teacher->photo}}" height="150" height="150" style="margin:15px" alt=""/>
                                <p style="color:red"> Uploading another photo will replace the existing one - if any </p>
                                <?php } ?>
                                <input type="file" name="image" id="image" size="20">

                            </div>
                        </div>
                        <div class="box-footer">
                            <?php
                            if ($editmode){
                            ?>
                            <button type="submit" class="btn btn-success pull-right">Update</button>
                            <?php
                            }
                            else
                            {
                            ?>
                            <button type="submit" class="btn btn-info pull-right">Save</button>
                            <?php 
                            }
                            ?>
                        </div>
                    </form>
                </div>   
            </div>  
            <div class="col-md-7">              
                <div class="box box-primary" id="tachelist">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">Teachers' List</h3>
                    </div>
                    <div class="box-body">
                        <div class="mailbox-controls">
                        </div>
                        <div class="row"><div class="col-sm-12">
                                    <table class="table table-striped table-bordered table-hover example dataTable no-footer"
                                     id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Teacher Name: activate to sort column descending" style="width: 189px;">Teacher Name</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 183px;">Email</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date Of Birth: activate to sort column ascending" style="width: 92px;">Date Of Birth</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 93px;">Phone</th><th class="text-right no-print sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action                                        : activate to sort column ascending" style="width: 83px;">Action                                        </th></tr>
                                </thead>
                                <tbody>
                                     @foreach($teachers as $teacher)
                                    <tr>
                                    <td>{!! $teacher->name !!}</td>
                                    <td>{!! $teacher->email !!} </td>
                                    <td>{!! $teacher->dob !!} </td>
                                    <td>{!! $teacher->phone !!} </td>
                                    <td class="mailbox-date pull-right">
                                    <a data-toggle="moda" data-target="#modal-defaul" href="{!! action('TeacherController@show', $teacher->id) !!}" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="Show">
                                    <i class="fa fa-reorder"></i>
                                    </a>
                                                <a href="{!! action('TeacherController@edit', $teacher->id) !!}" class="btn btn-default btn-xs " data-toggle="tooltip " title="Edit ">
                                                    <i class="fa fa-pencil "></i>
                                                </a>
                                                <a href="{!! action('TeacherController@delete', $teacher->id) !!}" class="btn btn-default btn-xs " data-toggle="tooltip " title="Delete " onclick="return confirm( 'Are you sure you want to delete this item?'); ">
                                                    <i class="fa fa-remove "></i>
                                                </a>
                                                </td>
                                    </tr>
                                    @endforeach                                            
</tbody>
                            </table></div></div></div>
                        </div>
                    </div>
                    <div class="">
                        <div class="mailbox-controls">
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>

            </div>   <!-- /.row -->
    </section><!-- /.content -->
    @endsection