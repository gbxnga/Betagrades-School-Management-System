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
                    <h3 class="box-title">Ward's Timetable</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-paddin ">
            
            @if (count($timetables)<1)
                        <br/><div class="col-md-12"><div class="alert alert-danger">No time table record for <?= $clas['name'].' ' .$clas['section'];?></div></div>
                        @else
<div class="col-md-12">
    <div class="table-responsive">
                        <table class="table table-bordered">
                            <br/>
                        <h4>Class Timetable for <strong><?= $clas['name'].' ' .$clas['section'];?></strong></h4>
                             <tbody><tr>
                            <th>Day</th>
                            <th>Period 1<br><span style="color:#cccccc;">8-9</span></th>
                            <th>Period 2<br><span style="color:#cccccc;">9-10</span></th>
                            <th>Period 3<br><span style="color:#cccccc;">10-11</span></th>
                            <th>Period 4<br><span style="color:#cccccc;">11-12</span></th>
                            <th>Period 5<br><span style="color:#cccccc;">12-1</span></th>
                            <th>Period 6<br><span style="color:#cccccc;">1-2</span></th>
                            <th>Period 7<br><span style="color:#cccccc;">1-3</span></th>
                            <th>Period 8<br><span style="color:#cccccc;">3-4</span></th>
                        </tr>
                            @foreach($timetables as $timetable)
                            <tr>
                            <td>{!! $timetable->day !!}</td>
                            <td>{!! $timetable->P1 !!} </td>
                            <td>{!! $timetable->P2 !!} </td>
                            <td>{!! $timetable->P3 !!} </td>
                            <td>{!! $timetable->P4 !!} </td>
                            <td>{!! $timetable->P5 !!} </td>
                            <td>{!! $timetable->P6 !!} </td>
                            <td>{!! $timetable->P7 !!} </td>
                            <td>{!! $timetable->P8 !!} </td>
                            </tr>
                            @endforeach 

                </tbody>

            </table>
            </div>
            @endif
            </div>
            </div>

        </div>

    </div>
</section>

@endsection