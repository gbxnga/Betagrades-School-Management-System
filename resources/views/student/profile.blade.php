@extends('student.master')

@section('title')
Student: {{$student->firstname}} {{$student->lastname}}
@endsection
@section('content')

<div class="content-wrapper" style="min-height: 681px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-user-plus"></i> Student Information <small></small> </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{url('/images/')}}/{{$student->image}}" alt="User profile picture">
                        <h3 class="profile-username text-center">{{$student->firstname}} {{$student->lastname}}</h3>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Admission Number</b> <a class="pull-right text-aqua">{{$student->admission_no}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Date of Birth</b> <a class="pull-right text-aqua">{{$student->date_of_birth}}</a>
                            </li>
                            <li class="list-group-item">
                                @foreach($classes as $class)
                              
                                                     <?php if ($class->id === $student->class_id) echo '<b>Class</b> <a class="pull-right text-aqua">'.$class->name.' - ('.$class->section.')</a>';?>
                                          
                                @endforeach
                                
                            </li>
                            <li class="list-group-item">
                                <b>Student Type</b> <a class="pull-right text-aqua">{{$student->student_type}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Gender</b> <a class="pull-right text-aqua">{{$student->gender}}</a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Profile</a></li>
                        <!--<li class=""><a href="#fee" data-toggle="tab" aria-expanded="false">Fees</a></li>
                        <li class=""><a href="#exam" data-toggle="tab" aria-expanded="false">Exam</a></li>
                        <li class=""><a href="#documents" data-toggle="tab" aria-expanded="false">Documents</a></li>-->
                        <li class="pull-right"><a href="{!! action('StudentController@delete', $student->id) !!}" class="text-red" onclick="return confirm('Are you sure you want to delete this Student? All related data can not be recovered!');"><i class="fa fa-trash"></i> Delete Student</a></li>
<li class="pull-right">
                             <a class="btn btn-success pull-right text-blue" href="{!! action('StudentController@edit_form', $student->id) !!}" title=""><i class="fa fa-pencil"></i>
                                Edit details</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="activity">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-4">Admission Date</td>
                                            <td class="col-md-5">
                                                {{$student->admission_date}}</td>
                                        </tr>
                                        <tr>
                                            <td>Date Of Birth</td>
                                            <td>{{$student->date_of_birth}} </td>
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td>
                                                General
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mobile Number</td>
                                            <td>{{$student->mobileno}}</td>
                                        </tr>
                                        <tr>
                                            <td>Religion</td>
                                            <td>{{$student->religion}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$student->email}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h3>Address </h3>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Current Address</td>
                                            <td>{{$student->current_address}}</td>
                                        </tr>
                                        <tr>
                                            <td>Permanent Address</td>
                                            <td>{{$student->current_address}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h3>Parent / Guardian Details </h3>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-4">Father Name</td>
                                            <td class="col-md-5">{{$student->father_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Father Phone</td>
                                            <td>{{$student->father_phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Father Occupation</td>
                                            <td>{{$student->father_occupation}}</td>
                                        </tr>
                                        <tr>
                                            <td>Mother Name</td>
                                            <td>{{$student->mother_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Mother Phone</td>
                                            <td>{{$student->mother_phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Mother Occupation</td>
                                            <td>{{$student->mother_occupation}}</td>
                                        </tr>
                                        <tr>
                                            <td>Guardian Name</td>
                                            <td>{{$student->guardian_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Guardian Relation</td>
                                            <td>{{$student->guardian_relation}}</td>
                                        </tr>
                                        <tr>
                                            <td>Guardian Phone</td>
                                            <td>{{$student->guardian_phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Guardian Occupation</td>
                                            <td>{{$student->guardian_occupation}}</td>
                                        </tr>
                                        <tr>
                                            <td>Guardian Address</td>
                                            <td>{{$student->guardian_address}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <h3>Miscellaneous Details</h3>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-4">Previous School Details</td>
                                            <td class="col-md-5">Brooklyn Public School</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-4">National Identification Number</td>
                                            <td class="col-md-5">46464746</td>
                                        </tr>
                                        <tr>
                                            <td>Local Identification Number</td>
                                            <td>446464</td>
                                        </tr>
                                        <tr>
                                            <td>Bank Account Number</td>
                                            <td>68654</td>
                                        </tr>
                                        <tr>
                                            <td>Bank Name</td>
                                            <td>UBS Bank</td>
                                        </tr>
                                        <tr>
                                            <td>IFSC Code</td>
                                            <td>UBS5644</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--<div class="tab-pane" id="fee">
                            <h2 class="page-header">Class Fees Detail</h2>
                            <table class="table table-hover table-striped">

                                <thead>
                                    <tr>
                                        <th>Fees Group</th>
                                        <th>Fees Code</th>
                                        <th class="text text-center">Due Date</th>
                                        <th class="text text-center">Status</th>
                                        <th class="text text-right">Amount</th>
                                        <th class="text text-center">Payment Id</th>
                                        <th class="text text-center">Mode</th>
                                        <th class="text text-center">Date</th>


                                        <th class="text text-right">Discount</th>
                                        <th class="text text-right">Fine</th>
                                        <th class="text text-right">Paid</th>
                                        <th class="text text-right">Balance</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>admission-fees</td>
                                        <td class="text text-center">

                                            04/01/2017 </td>
                                        <td class="text text-center">
                                            <span class="label label-warning">Partial</span>
                                        </td>
                                        <td class="text text-right">1000.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">22.00</td>
                                        <td class="text text-right">2.00</td>
                                        <td class="text text-right">1000.00</td>
                                        <td class="text text-right">
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 44/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/21/2017 </td>
                                        <td class="text text-right">22.00</td>
                                        <td class="text text-right">2.00</td>
                                        <td class="text text-right">1000.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>apr-month-fees</td>
                                        <td class="text text-center">

                                            04/10/2017 </td>
                                        <td class="text text-center">
                                            <span class="label label-success">Paid</span>
                                        </td>
                                        <td class="text text-right">400.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">400.00</td>
                                        <td class="text text-right">
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 2/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            04/19/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">100.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 2/2</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            04/22/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">100.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 2/3</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/04/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">50.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 2/4</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/05/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">150.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>may-month-fees</td>
                                        <td class="text text-center">

                                            05/10/2017 </td>
                                        <td class="text text-center">
                                            <span class="label label-success">Paid</span>
                                        </td>
                                        <td class="text text-right">400.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">100.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">300.00</td>
                                        <td class="text text-right">
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 3/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            05/16/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">100.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 3/2</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-info">cls-top-disc given</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            05/25/2017 </td>
                                        <td class="text text-right">100.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 3/3</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/05/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">200.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>jun-month-fees</td>
                                        <td class="text text-center">

                                            06/10/2017 </td>
                                        <td class="text text-center">
                                            <span class="label label-success">Paid</span>
                                        </td>
                                        <td class="text text-right">400.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">250.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">150.00</td>
                                        <td class="text text-right">
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 4/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            06/14/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">150.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 4/2</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-info">early-adm-disc given of 250</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/04/2017 </td>
                                        <td class="text text-right">250.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>jul-month-fees</td>
                                        <td class="text text-center">

                                            07/10/2017 </td>
                                        <td class="text text-center">
                                            <span class="label label-warning">Partial</span>
                                        </td>
                                        <td class="text text-right">400.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">600.00</td>
                                        <td class="text text-right">
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 7/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/04/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">200.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 7/2</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/05/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">400.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>aug-month-fees</td>
                                        <td class="text text-center">

                                            08/10/2017 </td>
                                        <td class="text text-center">
                                            <span class="label label-success">Paid</span>
                                        </td>
                                        <td class="text text-right">400.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">400.00</td>
                                        <td class="text text-right">
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 42/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-info">klklk</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/20/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">400.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>uniform-dress-fees</td>
                                        <td class="text text-center">

                                            08/31/2017 </td>
                                        <td class="text text-center">
                                            <span class="label label-success">Paid</span>
                                        </td>
                                        <td class="text text-right">100.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">100.00</td>
                                        <td class="text text-right">
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 19/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/04/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">10.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 19/2</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-info">k</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/20/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">10.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 19/3</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-info">abcd</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/20/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">80.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="danger">


                                        <td>Class 6 General</td>
                                        <td>caution-money-fees</td>
                                        <td class="text text-center">

                                            08/31/2017 </td>
                                        <td class="text text-center">
                                            <span class="label label-warning">Partial</span>
                                        </td>
                                        <td class="text text-right">500.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">100.00</td>
                                        <td class="text text-right">400.00
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 23/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-info">Thiz </p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/04/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">100.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>sep-month-fees</td>
                                        <td class="text text-center">

                                            09/10/2017 </td>
                                        <td class="text text-center">
                                            <span class="label label-warning">Partial</span>
                                        </td>
                                        <td class="text text-right">400.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">300.00</td>
                                        <td class="text text-right">100.00
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 26/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/05/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">200.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 26/2</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/05/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">100.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>library-fees</td>
                                        <td class="text text-center">

                                            09/30/2017 </td>
                                        <td class="text text-center">
                                            <span class="label label-success">Paid</span>
                                        </td>
                                        <td class="text text-right">300.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">300.00</td>
                                        <td class="text text-right">
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 27/2</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/20/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">280.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 27/3</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/21/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">20.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>oct-month-fees</td>
                                        <td class="text text-center">

                                            10/10/2017 </td>
                                        <td class="text text-center">
                                            <span class="label label-warning">Partial</span>
                                        </td>
                                        <td class="text text-right">400.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">500.00</td>
                                        <td class="text text-right">
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 39/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/06/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">500.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>nov-month-fees</td>
                                        <td class="text text-center">

                                            11/10/2017 </td>
                                        <td class="text text-center">
                                            <span class="label label-warning">Partial</span>
                                        </td>
                                        <td class="text text-right">400.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">1000.00</td>
                                        <td class="text text-right">
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 40/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/06/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">1000.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>dec-month-fees</td>
                                        <td class="text text-center">

                                            12/10/2017 </td>
                                        <td class="text text-center">
                                            <span class="label label-warning">Partial</span>
                                        </td>
                                        <td class="text text-right">400.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">1000.00</td>
                                        <td class="text text-right">
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 41/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/06/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">1000.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>exam-fees</td>
                                        <td class="text text-center">

                                            12/31/2017 </td>
                                        <td class="text text-center">
                                            <span class="label label-success">Paid</span>
                                        </td>
                                        <td class="text text-right">200.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">200.00</td>
                                        <td class="text text-right">
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 43/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/20/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">200.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>jan-month-fees</td>
                                        <td class="text text-center">

                                            01/10/2018 </td>
                                        <td class="text text-center">
                                            <span class="label label-success">Paid</span>
                                        </td>
                                        <td class="text text-right">400.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">400.00</td>
                                        <td class="text text-right">
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 48/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/21/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">400.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>feb-month-fees</td>
                                        <td class="text text-center">

                                            02/10/2018 </td>
                                        <td class="text text-center">
                                            <span class="label label-success">Paid</span>
                                        </td>
                                        <td class="text text-right">400.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">400.00</td>
                                        <td class="text text-right">
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 49/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/21/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">400.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-gray">


                                        <td>Class 6 General</td>
                                        <td>mar-month-fees</td>
                                        <td class="text text-center">

                                            03/10/2018 </td>
                                        <td class="text text-center">
                                            <span class="label label-danger">Unpaid</span>
                                        </td>
                                        <td class="text text-right">400.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">400.00
                                        </td>




                                    </tr>

                                    <tr class="dark-gray">


                                        <td>Route Brooklyn West</td>
                                        <td>trans-bus-fees</td>
                                        <td class="text text-center">

                                            09/30/2017 </td>
                                        <td class="text text-center">
                                            <span class="label label-warning">Partial</span>
                                        </td>
                                        <td class="text text-right">1500.00</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">500.00</td>
                                        <td class="text text-right">1000.00
                                        </td>




                                    </tr>

                                    <tr class="white-td">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                                        <td class="text text-center">


                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 16/1</a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>
                                            </div>


                                        </td>
                                        <td class="text text-center">Cash</td>
                                        <td class="text text-center">

                                            08/04/2017 </td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">0.00</td>
                                        <td class="text text-right">500.00</td>


                                        <td></td>



                                    </tr>
                                    <tr class="dark-light">
                                        <td align="left"> Discount </td>
                                        <td align="left">
                                            cls-top-disc </td>
                                        <td align="left"></td>
                                        <td align="left" class="text text-left">
                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title="">

                                                            Discount of $100.00 Applied : 3/2
                                                        </a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>

                                            </div>

                                        </td>
                                        <td></td>
                                        <td class="text text-left"></td>
                                        <td class="text text-left"></td>
                                        <td class="text text-left"></td>
                                        <td class="text text-right">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                    <tr class="dark-light">
                                        <td align="left"> Discount </td>
                                        <td align="left">
                                            early-adm-disc </td>
                                        <td align="left"></td>
                                        <td align="left" class="text text-left">
                                            <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title="">

                                                            Discount of $250.00 Applied : 4/2
                                                        </a>
                                            <div class="fee_detail_popover" style="display: none">
                                                <p class="text text-danger">No Description</p>

                                            </div>

                                        </td>
                                        <td></td>
                                        <td class="text text-left"></td>
                                        <td class="text text-left"></td>
                                        <td class="text text-left"></td>
                                        <td class="text text-right">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                    <tr class="dark-light">
                                        <td align="left"> Discount </td>
                                        <td align="left">
                                            sibling-disc </td>
                                        <td align="left"></td>
                                        <td align="left" class="text text-left">
                                            <p class="text text-danger">Discount of $500.00 Assigned
                                            </p>
                                        </td>
                                        <td></td>
                                        <td class="text text-left"></td>
                                        <td class="text text-left"></td>
                                        <td class="text text-left"></td>
                                        <td class="text text-right">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>

                                    <tr class="box box-solid total-bg">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text text-right">Grand Total</td>
                                        <td class="text text-right">$8400.00</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td class="text text-right">$372.00</td>
                                        <td class="text text-right">$2.00</td>
                                        <td class="text text-right">$7650.00</td>

                                        <td class="text text-right">$378.00</td>

                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane" id="documents">
                            <div class="timeline-header no-border">
                                <button type="button" data-student-session-id="1" class="btn btn-xs btn-primary pull-right myTransportFeeBtn"> <i class="fa fa-upload"></i>  Upload Documents</button>

                                <h2 class="page-header">Documents List</h2>
                                <div class="table-responsive">
                                    <div class="row">
                                    </div>
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                        <div class="dt-buttons btn-group btn-group2"><a class="btn btn-default buttons-copy buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="Copy"><span><i class="fa fa-files-o"></i></span></a><a class="btn btn-default buttons-excel buttons-html5"
                                                tabindex="0" aria-controls="DataTables_Table_0" href="#" title="Excel"><span><i class="fa fa-file-excel-o"></i></span></a><a class="btn btn-default buttons-csv buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"
                                                href="#" title="CSV"><span><i class="fa fa-file-text-o"></i></span></a><a class="btn btn-default buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="PDF"><span><i class="fa fa-file-pdf-o"></i></span></a>
                                            <a
                                                class="btn btn-default buttons-print" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="Print"><span><i class="fa fa-print"></i></span></a><a class="btn btn-default buttons-collection buttons-colvis" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="Columns"><span><i class="fa fa-columns"></i></span></a></div>
                                        <div
                                            class="row">
                                            <div class="col-sm-6 pull-right22">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="form-control" placeholder="Search..." aria-controls="DataTables_Table_0"></label></div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-striped table-bordered table-hover example dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
                                                Title                                            : activate to sort column descending" style="width: 0px;">
                                                            Title </th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="
                                                 Name                                            : activate to sort column ascending" style="width: 0px;">
                                                            Name </th>
                                                        <th class="mailbox-date text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="
                                                Action                                            : activate to sort column ascending" style="width: 0px;">
                                                            Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">Birth Certificate</td>
                                                        <td>ad-School-1.jpg</td>
                                                        <td class="mailbox-date pull-right">
                                                            <a href="https://demo.smart-school.in/student/download/1/ad-School-1.jpg" class="btn btn-default btn-xs" data-toggle="tooltip" title="Download">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                            <a href="https://demo.smart-school.in/student/doc_delete/5/1" class="btn btn-default btn-xs" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                <i class="fa fa-remove"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">Transfer Certificate</td>
                                                        <td>rm-1.jpg</td>
                                                        <td class="mailbox-date pull-right">
                                                            <a href="https://demo.smart-school.in/student/download/1/rm-1.jpg" class="btn btn-default btn-xs" data-toggle="tooltip" title="Download">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                            <a href="https://demo.smart-school.in/student/doc_delete/4/1" class="btn btn-default btn-xs" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                <i class="fa fa-remove"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0"><i class="fa fa-angle-left"></i></a></li>
                                                    <li class="paginate_button active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1</a></li>
                                                    <li class="paginate_button next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0"><i class="fa fa-angle-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                    </div>
                    <!--<div class="tab-pane" id="exam">
                        <h2 class="page-header">Exam List</h2>
                        <h4 class="page-header">Unit Test - April</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Subject </th>
                                        <th>
                                            Full Marks </th>
                                        <th>
                                            Passing Marks </th>
                                        <th>
                                            Obtain Marks </th>
                                        <th class="text text-right">
                                            Result </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> Mathematics (Th.) </td>
                                        <td>10</td>
                                        <td>4</td>
                                        <td>
                                            9.20 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Science (Th.) </td>
                                        <td>10</td>
                                        <td>4</td>
                                        <td>
                                            9.70 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Social Studies (Th.) </td>
                                        <td>10</td>
                                        <td>4</td>
                                        <td>
                                            9.50 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Arts (Th.) </td>
                                        <td>10</td>
                                        <td>4</td>
                                        <td>
                                            8.90 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> English (Th.) </td>
                                        <td>10</td>
                                        <td>4</td>
                                        <td>
                                            9.10 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Drawing (Pr.) </td>
                                        <td>10</td>
                                        <td>5</td>
                                        <td>
                                            9.20 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">

                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Grand Total :
                                        <span class="description-text">55.6/60</span>

                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Percentage:
                                        <span class="description-text">92.67                                                        </span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-3 pull">
                                <div class="description-block">
                                    <h5 class="description-header">Result :
                                        <span class="description-text">
                                                                                                                            <b class="text text-success">Pass</b>
                                                                                                                        </span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">
                                        <span class="description-text">                                                                        Grade : A++                                                                        </span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <h4 class="page-header">Unit Test - May</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Subject </th>
                                        <th>
                                            Full Marks </th>
                                        <th>
                                            Passing Marks </th>
                                        <th>
                                            Obtain Marks </th>
                                        <th class="text text-right">
                                            Result </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> Mathematics (Th.) </td>
                                        <td>10</td>
                                        <td>4</td>
                                        <td>
                                            8.40 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Science (Th.) </td>
                                        <td>10</td>
                                        <td>4</td>
                                        <td>
                                            6.40 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Social Studies (Th.) </td>
                                        <td>10</td>
                                        <td>4</td>
                                        <td>
                                            7.50 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Arts (Th.) </td>
                                        <td>10</td>
                                        <td>4</td>
                                        <td>
                                            8.70 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> English (Th.) </td>
                                        <td>10</td>
                                        <td>4</td>
                                        <td>
                                            9.10 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Drawing (Pr.) </td>
                                        <td>10</td>
                                        <td>5</td>
                                        <td>
                                            8.90 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">

                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Grand Total :
                                        <span class="description-text">49/60</span>

                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Percentage:
                                        <span class="description-text">81.67                                                        </span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-3 pull">
                                <div class="description-block">
                                    <h5 class="description-header">Result :
                                        <span class="description-text">
                                                                                                                            <b class="text text-success">Pass</b>
                                                                                                                        </span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">
                                        <span class="description-text">                                                                        Grade : A+                                                                        </span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <h4 class="page-header">Unit Test - August</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Subject </th>
                                        <th>
                                            Full Marks </th>
                                        <th>
                                            Passing Marks </th>
                                        <th>
                                            Obtain Marks </th>
                                        <th class="text text-right">
                                            Result </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> Mathematics (Th.) </td>
                                        <td>100</td>
                                        <td>50</td>
                                        <td>
                                            85.00 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Science (Th.) </td>
                                        <td>100</td>
                                        <td>50</td>
                                        <td>
                                            89.00 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Social Studies (Th.) </td>
                                        <td>100</td>
                                        <td>50</td>
                                        <td>
                                            98.00 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Arts (Th.) </td>
                                        <td>100</td>
                                        <td>50</td>
                                        <td>
                                            89.00 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> English (Th.) </td>
                                        <td>100</td>
                                        <td>50</td>
                                        <td>
                                            78.00 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Drawing (Pr.) </td>
                                        <td>100</td>
                                        <td>50</td>
                                        <td>
                                            89.00 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Mathematics (Th.) </td>
                                        <td>100</td>
                                        <td>50</td>
                                        <td>
                                            88.00 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">

                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Grand Total :
                                        <span class="description-text">616/700</span>

                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Percentage:
                                        <span class="description-text">88.00                                                        </span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-3 pull">
                                <div class="description-block">
                                    <h5 class="description-header">Result :
                                        <span class="description-text">
                                                                                                                            <b class="text text-success">Pass</b>
                                                                                                                        </span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">
                                        <span class="description-text">                                                                        Grade : A+                                                                        </span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <h4 class="page-header">Half Yearly Exam</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Subject </th>
                                        <th>
                                            Full Marks </th>
                                        <th>
                                            Passing Marks </th>
                                        <th>
                                            Obtain Marks </th>
                                        <th class="text text-right">
                                            Result </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> Mathematics (Th.) </td>
                                        <td>100</td>
                                        <td>35</td>
                                        <td>
                                            86.00 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Science (Th.) </td>
                                        <td>100</td>
                                        <td>35</td>
                                        <td>
                                            90.00 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Social Studies (Th.) </td>
                                        <td>100</td>
                                        <td>35</td>
                                        <td>
                                            89.00 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Arts (Th.) </td>
                                        <td>100</td>
                                        <td>35</td>
                                        <td>
                                            94.00 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> English (Th.) </td>
                                        <td>100</td>
                                        <td>35</td>
                                        <td>
                                            91.00 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                    <tr>
                                        <td> Drawing (Pr.) </td>
                                        <td>50</td>
                                        <td>25</td>
                                        <td>
                                            46.00 </td>
                                        <td class="text text-center">
                                            <span class="label pull-right bg-green">Pass</span> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">

                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Grand Total :
                                        <span class="description-text">496/550</span>

                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Percentage:
                                        <span class="description-text">90.18                                                        </span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-3 pull">
                                <div class="description-block">
                                    <h5 class="description-header">Result :
                                        <span class="description-text">
                                                                                                                            <b class="text text-success">Pass</b>
                                                                                                                        </span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">
                                        <span class="description-text">                                                                        Grade : A++                                                                        </span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <h4 class="page-header">unit test supple</h4>
                        <div class="alert alert-info">No Result Prepared</div>
                    </div>-->
                </div>
            </div>
        </div>
</div>
</section>
</div>

@endsection