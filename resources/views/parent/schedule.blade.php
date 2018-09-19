@extends('parent.master')

@section('title')
Ward's Timetable
@endsection
@section('content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Final Examination for <strong>{{$class->name}} ({{$class->section}})</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-paddin ">
                <div class="col-sm-12">
                    <?php
                    if (count($EXAMS)>0){
                    ?>
                    <table class="table table-hover dataTable no-footer example1" id="">
                        <thead>
                            <tr role="row">
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($EXAMS as $exam)
                            <tr role="row" class="odd">
                                <td  style="width:200px;" class="sorting_1">{{$exam->subject}}</td>
                                <td class="">{{$exam->date}}</td>
                                <td class="text text-center">{{$exam->start_time}}</td>
                                <td class="text text-center">{{$exam->end_time}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <?php
                    }
                    ?>
                </div>
                </div>
                </div>
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Continous Assessment II for <strong>{{$class->name}} ({{$class->section}})</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-paddin ">

                                <div class="col-sm-12">
                    <?php
                    if (count($CA2S)>0){
                    ?>
                    <table class="table table-hover dataTable no-footer example1" id="">
                        <thead>
                            <tr role="row">
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($CA2S as $ca2)
                            <tr role="row" class="odd">
                                <td  style="width:200px;" class="sorting_1">{{$ca2->subject}}</td>
                                <td class="">{{$ca2->date}}</td>
                                <td class="text text-center">{{$ca2->start_time}}</td>
                                <td class="text text-center">{{$ca2->end_time}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <?php
                    }
                    ?>
                </div>
                </div>
                </div>
            
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Continous Assessment I for <strong>{{$class->name}} ({{$class->section}})</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-paddin ">

                                <div class="col-sm-12">
                     <?php
                    if (count($CA1S)>0){
                    ?>
                    <table class="table table-hover dataTable no-footer example1" id="">
                        <thead>
                            <tr role="row">
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($CA1S as $ca1)
                            <tr role="row" class="odd">
                                <td  style="width:200px;" class="sorting_1">{{$ca1->subject}}</td>
                                <td class="">{{$ca1->date}}</td>
                                <td class="text text-center">{{$ca1->start_time}}</td>
                                <td class="text text-center">{{$ca1->end_time}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <?php
                    }
                    ?>
                </div>
                </div>
                </div>
            </div>
            </div>

        </div>

    </div>
</section>

@endsection