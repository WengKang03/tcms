<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth','admin']], function () {

Route::get('/admin.admin-dashboard', function () {
    return view('admin.admin-dashboard');
});
Route::get('/admin.admin-user-list', function () {
    return view('admin.admin-user-list');
});

Route::get('/admin.admin-create-user', function () {
    return view('admin.admin-create-user');
});

Route::get('/admin.admin-create-user-timetable', function () {
    return view('admin.admin-create-user-timetable');
});

Route::get('/admin.admin-view-attendance', function () {
    return view('admin.admin-view-attendance');
});

Route::get('/admin.admin-view-subject-enrol-list', function () {
    return view('admin.admin-view-subject-enrol-list');
});



    Route::get('/admin.admin-dashboard', 'Admin\DashboardController@admin_data');

    
    Route::post('/user-create','Admin\DashboardController@user_create');
   
    Route::get('/admin.admin-user-list', 'Admin\DashboardController@user_list');
   
    Route::get('/admin-modify-user-profile/{id}', 'Admin\DashboardController@user_edit');
  
    Route::put('/admin-modify-user-profile-update/{id}','Admin\DashboardController@user_update');
 
    Route::delete('/user-delete/{id}','Admin\DashboardController@user_delete');



    Route::get('/admin.admin-manage-teacher', 'Admin\DashboardController@teacher_list');

    Route::get('/admin-modify-teacher-information/{id}', 'Admin\DashboardController@teacher_edit');
  
    Route::put('/admin-modify-teacher-information-update/{id}','Admin\DashboardController@teacher_update');
 
    Route::delete('/admin-teacher-delete/{id}','Admin\DashboardController@teacher_delete');


    Route::get('/admin.admin-manage-student', 'Admin\DashboardController@student_list');
    
    Route::get('/admin-modify-student-information/{id}', 'Admin\DashboardController@student_edit');
    
    Route::put('/admin-modify-student-information-update/{id}','Admin\DashboardController@student_update');
    
    Route::delete('/admin-student-delete/{id}','Admin\DashboardController@student_delete')->name('admin-student-delete/{id}');


    Route::post('/timetable-create', 'Admin\DashboardController@timetable_create');

    Route::get('/admin.admin-manage-user-timetable', 'Admin\DashboardController@timetable_list');

    Route::get('/admin-modify-user-timetable/{id}', 'Admin\DashboardController@timetable_edit');
    
    Route::put('/admin-modify-user-timetable-update/{id}','Admin\DashboardController@timetable_update');

    Route::delete('/admin-user-timetable-delete/{id}','Admin\DashboardController@timetable_delete');

    Route::get('/admin.admin-view-attendance/{id}', 'Admin\DashboardController@attendance_record_details');

    //subjecy Enrol
    Route::get('/admin.admin-view-subject-enrol-list', 'Admin\DashboardController@subject_enrol_list');
});


//teacher
Route::group(['middleware' => ['auth','teacher']], function () {

Route::get('/teacher.teacher-dashboard', function () {
    return view('teacher.teacher-dashboard');
});

Route::get('/teacher.teacher-create-material-information', function () {
    return view('teacher.teacher-create-material-information');
});

Route::get('/teacher.teacher-manage-attendance', function () {
    return view('teacher.teacher-manage-attendance');
});

Route::get('/teacher.teacher-create-attendance', function () {
    return view('teacher.teacher-create-attendance');
});


Route::get('/teacher-view-personal-information/{id}', 'Teacher\DashboardController@teacher_view');

Route::get('/teacher-modify-personal-information/{id}', 'Teacher\DashboardController@teacher_edit');
   
Route::put('/teacher-modify-personal-information-update/{id}','Teacher\DashboardController@teacher_update');

//Timetable
Route::get('/teacher.teacher-view-timetable', 'Teacher\DashboardController@timetable_list');

//Material 
Route::post('/material-create','Teacher\DashboardController@material_create');
    
    Route::get('/teacher.teacher-manage-material-information', 'Teacher\DashboardController@material_list');
    
    Route::get('/teacher-modify-material-information/{id}', 'Teacher\DashboardController@material_edit');
    
    Route::put('/teacher-modify-material-information-update/{id}','Teacher\DashboardController@material_update');
    
    Route::delete('/material-delete/{id}','Teacher\DashboardController@material_delete');

//Attendance
Route::post('/create-attendance','Teacher\DashboardController@create_attendance');
    
    Route::get('/teacher.teacher-manage-attendance', 'Teacher\DashboardController@attendance_record');
    
    Route::get('/teacher-modify-attendance/{id}', 'Teacher\DashboardController@attendance_edit');
    
    Route::put('/teacher-modify-attendance-update/{id}','Teacher\DashboardController@attendance_update');
});




//student
Route::group(['middleware' => ['auth','student']], function () {

    Route::get('/student.student-dashboard', function () {
        return view('student.student-dashboard');
    });

    Route::get('/student.student-create-subject-enrol', function () {
        return view('student.student-create-subject-enrol');
    });

Route::get('/student-view-personal-information/{id}', 'Student\DashboardController@student_view');

Route::get('/student-modify-personal-information/{id}', 'Student\DashboardController@student_edit');
   
Route::put('/student-modify-personal-information-update/{id}','Student\DashboardController@student_update');

Route::get('/student.student-view-timetable', 'Student\DashboardController@timetable_list');

Route::post('/create-subject-enrol','Student\DashboardController@subject_enrol_create');

Route::get('/student.student-view-subject-enrol-list', 'Student\DashboardController@subject_enrol_list');
});

