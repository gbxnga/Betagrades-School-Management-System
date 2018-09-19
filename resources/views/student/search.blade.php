
@extends('student.master')

@section('title')
IDP | Students
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List of Students
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{action('CalendarController@index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">List of students</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-search"></i> Select Criteria</h3>
                        </div>
                        <div class="box-body">
                            <div class="">
                                <div class="col-md-6">
                                    <form id="search_by_class_form" role="form" action="search" method="post" class="form-horizontal">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <input type="hidden" name="ci_csrf_token" value="">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <label>Class</label>
                                                <select id="class_id" name="class_id" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($classes as $class)
                                                {
                                                    <option value="{!! $class->name !!}">{!! $class->name !!}</option>
                                                }
                                                @endforeach
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Section</label>
                                                <select id="section" name="section" class="form-control">
                                                <option value="All">All</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>                                               
                                            </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" name="submit" value="search_class" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-search"></i> Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                 <div class="col-md-6">
                                    <form role="form" action="" method="post" class="form-horizontal">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label>Search By Keyword</label>
                                                <input type="text" name="info" class="form-control" placeholder="Search By student name, parent name or admission number">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" name="submit" value="search_particular" class="btn btn-primary pull-right btn-sm checkbox-toggle"><i class="fa fa-search"></i> Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div></div>
                                    </form>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    
                    <div class="box box-primary" id="table-con-box">
                        <div class="box-header">
                            <h3 class="box-title">Result</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive ">
                            <table id="example1" class="students-table table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th>Image</th>


                                        <th>Admission Number</th>
                                        <th>Full name</th>
                                        <th>Class</th>
                                        <th>Gender</th>
                                        <th>Date of birth</th>
                                        <th>Address</th>
                                        <th>Admission year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class=" ">
                                    @foreach($students as $student)
                                    <tr>
                                    <td>
                                    <img src="{{url('/images/')}}/{{$student->image}}" width="40" height="40"/>
                                    </td>

                                    <td>{!! $student->admission_no !!} </td>
                                    <td>{!! $student->firstname !!} {{ $student->lastname}}</td>
                                    <td>{!! $student->name !!} {{$student->section}} </td>
                                    <td>{!! $student->gender !!} </td>
                                    <td>{!! $student->date_of_birth !!} </td>
                                    <td>{!! $student->current_address !!} </td>
                                    <td>{!! $student->admission_date !!} </td>
                                    <td class="pull-right">
                                    <a data-toggle="moda" data-target="#modal-defaul" href="{!! action('StudentController@show', $student->stud_id) !!}" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="Show">
                                    <i class="fa fa-reorder"></i>
                                    </a>
                                    <a href="{!! action('StudentController@edit_form', $student->stud_id) !!}" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                    </a>
                                    </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Image</th>


                                        <th>Admission Number</th>
                                        <th>Full name</th>
                                        <th>Class</th>
                                        <th>Gender</th>
                                        <th>Date of birth</th>
                                        <th>Address</th>
                                        <th>Admission year</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                </table>
                        </div>
                        <!-- /.box-body -->
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
