<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Auth;
//use Auth;

Route::get('/', function () {
    return view('welcome');
    //return redirect('/parent');
});
Route::get('/admin', function () {
    //return view('welcome');
    return redirect('/admin/home');
});
Route::get('/teacher', function () {
    //return view('welcome');
    return redirect('/teacher/home');
});
Route::get('/test', function(){
    return view('parent.index');
});
Route::get('/teacher', function () {
    //return view('welcome');
    return redirect('/teacher/login');
});
Route::get('/teacher/login', 'Auth\TeacherLoginController@showLogin')->name('teacher.login');
Route::post('/teacher/login', 'Auth\TeacherLoginController@login')->name('teacher.login.submit');

Route::get('/admin/login', 'Auth\AdminLoginController@showLogin')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');


Route::group([ 'middleware' => [ 'auth:admin'] ], function(){
    Route::get('/student/search', 'StudentController@index');
    Route::post('/student/search', 'StudentController@search');
    Route::post('/student/search/info', 'StudentController@search_info');
    Route::get('/student/search/info', function(){
        return redirect('student/search');
    });

    Route::get('/student/register', 'StudentController@register_form');
    Route::post('/student/register', 'StudentController@register');

    Route::get('/student/edit/{id}', 'StudentController@edit_form');
    Route::post('/student/edit/{id}', 'StudentController@update');
    Route::get('/student/delete/{id}', 'StudentController@delete');
    //Route::get('/student/profile/{id}', 'StudentController@show');

});





Route::group([ 'middleware' => [ 'auth:teacher,admin'] ], function(){

    Route::get('/student/profile/{id}', 'StudentController@show');
});



Route::group([ 'middleware' => [ 'auth:teacher'] ], function(){

    Route::get('/teacher/home', 'CalendarController@index')->name('teacher.dashboard');
    Route::get('/teacher/news/{id}', 'NewsController@view')->name('teacher.news');

    //Route::get('/student/profile/{id}', 'StudentController@show');

    Route::get('teacher/timetable', 'TimetableController@index');
    Route::get('teacher/timetable/create', 'TimetableController@index_create');
    Route::post('teacher/timetable/create/{id}', 'TimetableController@create');
    Route::get('teacher/timetable/create/{id}', 'TimetableController@form');
    Route::get('teacher/timetable/view/{id}', 'TimetableController@show');
    Route::get('teacher/timetable/edit/{id}', 'TimetableController@edit_form');
    Route::post('teacher/timetable/edit/{id}', 'TimetableController@update');

    Route::get('teacher/attendance', 'AttendanceController@index')->name('teacher.attendance');;
    Route::post('teacher/attendance', 'AttendanceController@form');
    Route::post('teacher/attendance/save', 'AttendanceController@save')->name('teacher.attendance.save');
    Route::post('teacher/attendance/update', 'AttendanceController@update');
    Route::get('teacher/attendance/date', 'AttendanceController@date');
    Route::post('teacher/attendance/date', 'AttendanceController@date_list');
    Route::get('teacher/attendance/report', 'AttendanceController@index_report');
    Route::post('teacher/attendance/report', 'AttendanceController@report');

    Route::post('/teacher/examschedule/create', 'ExamScheduleController@schedule_form')->name('teacher.schedule.create.submit');
    Route::get('/teacher/examschedule/create', 'ExamScheduleController@class_form')->name('teacher.schedule.create');
    Route::post('/teacher/examschedule/create/save', 'ExamScheduleController@save_schedule')->name('teacher.schedule.save');;
    Route::post('/teacher/examschedule/update', 'ExamScheduleController@update_schedule')->name('teacher.schedule.update');;
    Route::get('/teacher/examschedule', 'ExamScheduleController@show_schedule_form');
    Route::post('/teacher/examschedule', 'ExamScheduleController@show_schedule');

    Route::get('/teacher/mark', 'MarkController@index')->name('teacher.mark');
    Route::post('/teacher/mark', 'MarkController@viewMarks')->name('teacher.mark.view');
    Route::get('/teacher/mark/create', 'MarkController@selectClassForm')->name('teacher.mark.create');
    Route::post('/teacher/mark/create', 'MarkController@marksForm')->name('teacher.mark.submit');
    Route::post('/teacher/mark/create/save', 'MarkController@saveMark')->name('teacher.mark.save');
    Route::post('/teacher/mark/create/update', 'MarkController@updateMark')->name('teacher.mark.update');

    Route::get('/teacher/gradereport', 'GradeReportController@index')->name('teacher.report');
    Route::post('/teacher/gradereport/index', 'GradeReportController@showStudentList')->name('teacher.report.list');
    Route::get('/teacher/gradereport/index', function(){
        return redirect(route('teacher.report'))->with('status', 'Please select class again');
    });
    Route::get('/teacher/gradereport/student/{id}', 'GradeReportController@showStudentReportForm')->name('teacher.report.student');
    Route::post('/teacher/gradereport/student/{id}', 'GradeReportController@generateReportForm')->name('teacher.report.student.submit');

    Route::get('/teacher/gradereport/view/{id}', 'GradeReportController@viewStudentReportForm')->name('teacher.report.student.view'); 

});

Route::group([ 'middleware' => [ 'auth:admin'] ], function(){
    Route::get('/admin/news/{id}', 'NewsController@view');
    Route::get('/admin/news/delete/{id}', 'NewsController@delete');

    Route::get('/admin/home', 'CalendarController@index')->name('admin.dashboard');

    Route::get('/admin/classes', 'TheClassController@index');
    Route::get('/admin/class/delete/{id}', 'TheClassController@delete');
    Route::post('/admin/classes', 'TheClassController@create');

    Route::get('/admin/classes/edit/{id}', 'TheClassController@edit');
    Route::post('/admin/classes/edit/{id}', 'TheClassController@update');

    Route::get('/admin/teacher', 'TeacherController@index');
    Route::post('/admin/teacher', 'TeacherController@create');

    Route::get('/admin/teacher/edit/{id}', 'TeacherController@edit');
    Route::post('/admin/teacher/edit/{id}', 'TeacherController@update');
    Route::get('/admin/teacher/delete/{id}', 'TeacherController@delete');
    Route::get('admin/teacher/profile/{id}', 'TeacherController@show');

    Route::get('admin/subject', 'SubjectController@index');
    Route::post('admin/subject', 'SubjectController@create');
    Route::get('admin/subject/edit/{id}', 'SubjectController@edit');
    Route::post('admin/subject/edit/{id}', 'SubjectController@update');
    Route::get('admin/subject/delete/{id}', 'SubjectController@delete');

    Route::get('admin/teacher/assign', 'AssignController@index');
    Route::get('admin/teacher/assign/{id}', 'AssignController@form');
    Route::post('admin/teacher/assign/{id}', 'AssignController@create');
    Route::get('admin/teacher/assign/delete/{id}', 'AssignController@delete');

    Route::get('admin/timetable', 'TimetableController@index');
    Route::get('admin/timetable/create', 'TimetableController@index_create');
    Route::post('admin/timetable/create/{id}', 'TimetableController@create');
    Route::get('admin/timetable/create/{id}', 'TimetableController@form');
    Route::get('admin/timetable/view/{id}', 'TimetableController@show');
    Route::get('admin/timetable/edit/{id}', 'TimetableController@edit_form');
    Route::post('admin/timetable/edit/{id}', 'TimetableController@update');
        
    //Route::get('admin/timetable/view/{id}', 'TimetableController@show');

    Route::get('admin/attendance', 'AttendanceController@index')->name('admin.attendance');
    Route::post('admin/attendance', 'AttendanceController@form');
    Route::post('admin/attendance/save', 'AttendanceController@save')->name('admin.attendance.save');
    Route::post('admin/attendance/update', 'AttendanceController@update');
    Route::get('admin/attendance/date', 'AttendanceController@date');
    Route::post('admin/attendance/date', 'AttendanceController@date_list');
    Route::get('admin/attendance/report', 'AttendanceController@index_report');
    Route::post('admin/attendance/report', 'AttendanceController@report');

    Route::post('/admin/examschedule/create', 'ExamScheduleController@schedule_form')->name('admin.schedule.create.submit');;
    Route::get('/admin/examschedule/create', 'ExamScheduleController@class_form')->name('admin.schedule.create');;
    Route::post('/admin/examschedule/create/save', 'ExamScheduleController@save_schedule')->name('admin.schedule.save');;
    Route::post('/admin/examschedule/update', 'ExamScheduleController@update_schedule')->name('admin.schedule.update');;
    Route::get('/admin/examschedule', 'ExamScheduleController@show_schedule_form');
    Route::post('/admin/examschedule', 'ExamScheduleController@show_schedule');

    Route::get('/admin/mark', 'MarkController@index')->name('admin.mark');
    Route::post('/admin/mark', 'MarkController@viewMarks')->name('admin.mark.view');
    Route::get('/admin/mark/create', 'MarkController@selectClassForm')->name('admin.mark.create');
    Route::post('/admin/mark/create', 'MarkController@marksForm')->name('admin.mark.submit');
    Route::post('/admin/mark/create/save', 'MarkController@saveMark')->name('admin.mark.save');
    Route::post('/admin/mark/create/update', 'MarkController@updateMark')->name('admin.mark.update');

    Route::get('/admin/gradereport', 'GradeReportController@index')->name('admin.report');
    Route::post('/admin/gradereport/index', 'GradeReportController@showStudentList')->name('admin.report.list');
    Route::get('/admin/gradereport/index', function(){
        return redirect(route('admin.report'))->with('status', 'Please select class again');
    });
    Route::get('/admin/gradereport/student/{id}', 'GradeReportController@showStudentReportForm')->name('admin.report.student');
    Route::post('/admin/gradereport/student/{id}', 'GradeReportController@generateReportForm')->name('admin.report.student.submit');

    Route::get('/admin/gradereport/view/{id}', 'GradeReportController@viewStudentReportForm')->name('admin.report.student.view'); 


    Route::get('/admin/school-info', 'SchoolInformationController@index');
    Route::get('/admin/school-info/create', 'SchoolInformationController@create');
    Route::post('/admin/school-info/create', 'SchoolInformationController@save');
    Route::get('/admin/school-info/edit/{id}', 'SchoolInformationController@edit_form');
    Route::post('/admin/school-info/edit/{id}', 'SchoolInformationController@update');

    Route::get('/admin/scratchcard/generate', 'ScratchCardController@index');
    Route::post('/admin/scratchcard/generate', 'ScratchCardController@generate');
    Route::get('/admin/scratchcard', 'ScratchCardController@viewAll');



    Route::get('/admin/calendar/events', 'CalendarController@getEvents');
    Route::post('/admin/calendar/event/add', 'CalendarController@addEvent');
    Route::post('/admin/calendar/news/add', 'CalendarController@addNews');
});




















Route::get('/parent', 'ParentController@index')->name('parent.dashboard');
Route::get('/parent/login', 'ParentController@showLogin');
Route::post('/parent/login', 'ParentController@doLogin');
Route::get('/parent/results', 'ParentController@result'); 
Route::get('/parent/attendance', 'ParentController@attendance');
Route::get('/parent/timetable', 'ParentController@timetable');
Route::get('/parent/examschedule', 'ParentController@schedule');
Route::get('/parent/student/profile', 'ParentController@profile');
//Route::get('/parent/examschedule', 'ExamScheduleController@show_schedule');






Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
