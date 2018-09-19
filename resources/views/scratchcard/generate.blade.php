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
            <?php
            if (isset($edit) && !empty($edit)){
                if ($edit['editmode'] === 'true')
                $editmode = true;
                else
                $editmode = false;
            }else {$editmode = false;}
            ?>
            <div class="col-xs-12 col-lg-8 col-lg-offset-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Generate Scratch Card</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Number of cards to generate</label>
                                <input type="num" name="num_of_cards" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">GENERATE</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <?php
            if ($editmode){
                $cards = json_decode($cards,true);
            ?>
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
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                    </tr>
                            </thead>
                            <tbody>
                            <?php
                            for ($i=0;$i<6;$i++){
                                echo '<tr style="height:100px">';
                                for ($t=0;$t<5;$t++)
                                {
                                    
                                        echo '<td>'.$cards[$i][$t]['value'].'</td>';
                                    
                                }
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>


@endsection