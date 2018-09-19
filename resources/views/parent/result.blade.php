@extends('parent.master')

@section('title')
Ward's Result
@endsection
@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Striped Full Width Table</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-paddin ">
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Class</th>

                            <th>Term</th>
                            <th>Session</th>
                            <th>Action</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>JSS2</td>
                            <td>First Term</td>
                            <td>2017/2018</td>
                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default">
                                                View Result
                                        </button></td>
                            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                                Print Result
                                        </button></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                                Download Result (PDF)
                                        </button>
                            </td>

                        </tr>
                        <tr>
                            <td>JSS2</td>
                            <td>Second Term</td>
                            <td>2017/2018</td>
                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default">
                                                View Result
                                        </button></td>
                            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                                Print Result
                                        </button></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                                Download Result (PDF)
                                        </button>
                            </td>
                        </tr>
                    </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
</section>
@endsection