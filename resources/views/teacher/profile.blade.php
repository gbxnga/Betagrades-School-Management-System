

@extends('student.master')

@section('title')
Teacher : {{$teacher->name}}
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
        </div>      
            <div class="col-md-4">              
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img width="150" height="150" class="profile-user-img img-responsive img-circle" src="{{url('/images/')}}/{{$teacher->photo}}" alt="User profile picture">
                        <h3 class="profile-username text-center">{{$teacher->name}}</h3>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Gender</b> <a class="pull-right text-aqua">{{$teacher->sex}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Date Of Birth</b> <a class="pull-right text-aqua">{{$teacher->dob}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Phone</b> <a class="pull-right text-aqua">{{$teacher->phone}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right text-aqua">{{$teacher->email}}</a>
                            </li>
                            <li style="height:100px" class="list-group-item">
                                <b>Address</b> <a  class="pull-right text-aqua">{{$teacher->address}}</a>
                            </li>
                        </ul>
                        <a class="btn btn-success pull-right" href="{!! action('TeacherController@edit', $teacher->id) !!}" title="">
                                Edit details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">              
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Teacher Subject</h3>
                        <!--<div class="box-tools pull-right">
                            <a href="#" class="schedule_modal text-green pull-right" data-toggle="tooltip" title=""><i class="fa fa-key"></i>
                                Login Details                            </a>
                        </div>-->
                    </div>
                    <div class="box-body">
                        <div class="mailbox-controls"> 
                        </div>
                        <div class="table-responsive mailbox-messages">
                            
                                             <table class="table table-striped table-bordered table-hover example dataTable no-footer" 
                                             id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">                          
                                <thead>
                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                    aria-sort="ascending" aria-label="Class: activate to sort column descending" style="width: 433px;">Class</th><th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Subject: activate to sort column ascending" style="width: 360px;">Subject</th></tr>
                                </thead>
                                <tbody>
                                    @foreach ($assigns as $assign)


                                                                                    
                                                                                        
                                            <tr role="row" class="odd">
                                                <td class="mailbox-name sorting_1">{{$assign->class}}</td>
                                                <td class="mailbox-name text-right">{{$assign->subject}}</td>
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