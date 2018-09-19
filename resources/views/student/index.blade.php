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
                                    <form role="form" action="search/info" method="post" class="form-horizontal">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    @yield('search_result')

                    

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>


@endsection