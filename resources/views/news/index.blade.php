
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
            News
            <small>{{$new->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{action('CalendarController@index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">News</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Read News</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>{{$new->title}}</h3>
                <h5>
                  <span class="mailbox-read-time pull-left"><?php echo date('NS \of F, Y',strtotime($new->created_at));?></span></h5>
              </div>
              
              <div class="mailbox-read-message">
                {{$new->news}}
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <!--<div class="box-footer">
              <ul class="mailbox-attachments clearfix">
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> App Description.docx</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png" alt="Attachment"></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo1.png</a>
                        <span class="mailbox-attachment-size">
                          2.67 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo2.png" alt="Attachment"></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo2.png</a>
                        <span class="mailbox-attachment-size">
                          1.9 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
              </ul>
            </div>-->
            <!-- /.box-footer -->
            <div class="box-footer">
            @if (Auth::guard('admin')->check())
              <a class="btn btn-default" href="{!! action('NewsController@delete', $new->id) !!}" onclick="return confirm('Are you sure you want to delete this News? All related data can not be recovered!');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
              @endif
              <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>

        <div class="col-md-4">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    School News
                  </span>
            </li>
            <!-- /.timeline-label -->
            @foreach ($news as $news)
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('Y-m-d',strtotime($news->created_at));?></span>

                <h3 class="timeline-header"><a href="#">{{$news->title}}</a> </h3>

                <div class="timeline-body">
                  <?php echo substr($news->news, 0, 150)."...";?>
                </div>
                <div class="timeline-footer">
                  <a 
                  @if (Auth::guard('teacher')->check())
                     href="{{route('teacher.news', $news->id)}}"
                    @elseif (Auth::guard('admin')->check())
                    href="{{action('NewsController@view', $news->id)}}"
                @endif 
                    
                    class="btn btn-primary btn-xs">Read more</a>
                  @if (Auth::guard('admin')->check())
                  <a href="{!! action('NewsController@delete', $news->id) !!}" onclick="return confirm('Are you sure you want to delete this News? All related data can not be recovered!');" class="btn btn-danger btn-xs">Delete</a>
                  @endif
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            @endforeach
            
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection