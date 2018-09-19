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

                <div class="alert alert-danger">{{ $error }}</div>

            @endforeach 
            @endif
            <?php
                if (isset($edit) && !empty($edit)){
                    $editmode = true;
                }else {$editmode = false;}
            ?> 
            </div>     
                <div class="col-md-4">              
                    <div class="box box-primary">
                        <div class="box-header with-border">
                        <?php
                        if ($editmode){
                            echo '<h3 class="box-title">Edit Subject</h3>';
                        }else{ echo '<h3 class="box-title">Add Subject</h3>';}
                        ?>
                            <h3 class="box-title">Add Subject</h3>
                        </div>
                        <form id="form1" name="employeeform" method="post" accept-charset="utf-8">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"> 
                            <div class="box-body">
                                     
                                <input type="hidden" name="ci_csrf_token" value="">                                <div class="form-group">
                                    <label for="exampleInputEmail1">Subject Name</label>
                                    <input id="category" name="name"
                                    <?php
                                    if ($editmode)
                                    {
                                        echo 'value="'.$subject['name'].'"';
                                    }
                                    ?>
                                     placeholder="" type="text" class="form-control">
                                    <span class="text-danger"></span>
                                </div>
                                <label class="radio-inline">
                                    <input type="radio"
                                    <?php 
                                            if ($editmode)
                                            {
                                                if($subject['type'] === 'Theory')
                                                echo 'checked="checked"';
                                            } 
                                    ?>
                                     value="Theory" name="type">
                                    Theory </label>
                                <label class="radio-inline">
                                    <input type="radio"
                                    <?php 
                                            if ($editmode)
                                            {
                                                if($subject['type'] === 'Practical')
                                                echo 'checked="checked"';
                                            } 
                                    ?>
                                     name="type" value="Practical">
                                    Practical</label>
                                <label class="radio-inline">
                                    <input type="radio"
                                    <?php 
                                            if ($editmode)
                                            {
                                                if($subject['type'] === 'None')
                                                echo 'checked="checked"';
                                            }
                                            else
                                            {
                                               echo 'checked="checked"'; 
                                            } 
                                    ?>
                                     name="type" value="None">None                                </label>
                                <!--<div class="form-group"><br>
                                    <label for="exampleInputEmail1">Subject Code</label>
                                    <input id="category" name="code" placeholder="" type="text" class="form-control" value="">
                                    <span class="text-danger"></span>
                                </div>-->
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">            
                    <div class="box box-primary" id="sublist">
                        <div class="box-header ptbnull">
                            <h3 class="box-title titlefix">Subject List</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive mailbox-messages">
                                <table id="example1" class=" table table-bordered table-striped">
                                    <thead>
                                         <tr>
                                         <th>Subject</th>
                                         <th>Subject Type</th>
                                         <th>Action</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                                                                            
                                    @foreach($subjects as $subject)
                                    <tr>
                                    <td>{!! $subject->name !!}</td>
                                    <td>{!! $subject->type !!} </td>
                                    <td class="mailbox-date pull-right">
                                    <a data-toggle="moda" data-target="#modal-defaul" href="" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="Show">
                                    <i class="fa fa-reorder"></i>
                                    </a>
                                                <a href="{{ action('SubjectController@edit', $subject->id)}}" class="btn btn-default btn-xs " data-toggle="tooltip " title="Edit ">
                                                    <i class="fa fa-pencil "></i>
                                                </a>
                                                <a href="{{ action('SubjectController@delete', $subject->id)}}" class="btn btn-default btn-xs " data-toggle="tooltip " title="Delete " onclick="return confirm( 'Are you sure you want to delete this item?'); ">
                                                    <i class="fa fa-remove "></i>
                                                </a>
                                                </td>
                                    </tr>
                                    @endforeach                                                          
                                    </tbody>
                                    <tfoot>
                                    <th>Subject</th>
                                         <th>Subject Type</th>
                                         <th>Action</th>
                                    </tfoot>
                                </table>
                                </div>
                                </div>
                                
                                </div></div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        </section>

            </div>   <!-- /.row -->
    </section><!-- /.content -->
    @endsection