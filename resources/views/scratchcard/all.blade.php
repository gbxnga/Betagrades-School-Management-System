@extends('student.master')

@section('title')
Class
@endsection
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            GENERATE SCRATCH CARD
            <small>Generate card</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Generate Scratch card</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            @if (session('status'))
                <div class="col-md-12"><div class="alert alert-success">
                    {{ session('status') }}
                </div></div>
            @endif
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> Generated Scratch Cards</h3>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                        <table class="table table-hover dataTable no-footer example1">
                            <thead>
                                    <tr role="row">
                                        <th>card_id</th>
                                        <th>Scratch Card code</th>
                                        <th>Student</th>
                                        <th>Status</th>
                                        <th>Date Generated</th>
                                    </tr>
                            </thead>
                            <tbody>
                                @foreach ($cards as $card)
                                    <tr>
                                        <td>{{$card->id}}</td>
                                        <td>{{$card->value}}</td>
                                        <td>{{$card->student_Name}}</td>
                                        <td>{{$card->status}}</td>
                                        <td>{{$card->created_at}}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>


@endsection