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

Route::get('/admin.admin-modify-user-profile', function () {
    return view('admin.admin-modify-user-profile');
});

 Route::get('/admin.admin-dashboard', 'Admin\DashboardController@admin_data');

   
    Route::get('/admin.admin-dashboard', 'Admin\DashboardController@admin_data');

    
    Route::post('/user-create','Admin\DashboardController@user_create');
   
    Route::get('/admin.admin-user-list', 'Admin\DashboardController@user_list');
   
    Route::get('/admin-modify-user-profile/{id}', 'Admin\DashboardController@user_edit');
  
    Route::put('/admin-modify-user-profile-update/{id}','Admin\DashboardController@user_update');
 
    Route::delete('/user-delete/{id}','Admin\DashboardController@user_delete');



    Route::get('/admin.admin-manage-teacher', 'Admin\DashboardController@teacher_list');

    Route::get('/admin-modify-teacher-information/{id}', 'Admin\DashboardController@teacher_edit');
  
    Route::put('/admin-modify-teacher-information-update/{id}','Admin\DashboardController@teacher_update');
 
    Route::delete('/admin-teacher-delete/{id}','Admin\DashboardController@teacher_delete')->name('admin-teacher-delete/{id}');





    Route::get('/admin.admin-manage-student', 'Admin\DashboardController@student_list');
    
    Route::get('/admin-modify-student-information/{id}', 'Admin\DashboardController@student_edit');
    
    Route::put('/admin-modify-student-information-update/{id}','Admin\DashboardController@student_update');
    
    Route::delete('/admin-student-delete/{id}','Admin\DashboardController@student_delete')->name('admin-student-delete/{id}');

});

//teacher
Route::group(['middleware' => ['auth','teacher']], function () {

Route::get('/teacher.teacher-dashboard', function () {
    return view('teacher.teacher-dashboard');
});

Route::get('/teacher-modify-personal-information/{id}', 'Teacher\DashboardController@teacher_edit');
   
Route::put('/teacher-modify-personal-information-update/{id}','Teacher\DashboardController@teacher_update');

});



//student
Route::group(['middleware' => ['auth','student']], function () {

    Route::get('/student.student-dashboard', function () {
        return view('student.student-dashboard');
    });

Route::get('/student-modify-personal-information/{id}', 'Student\DashboardController@student_edit');
   
Route::put('/student-modify-personal-information-update/{id}','Student\DashboardController@student_update');
});
