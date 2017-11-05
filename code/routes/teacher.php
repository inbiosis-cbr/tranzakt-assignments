<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('teacher')->user();

    //dd($users);
    $userType = 'teacher';
    return view('adminlte.teacher.home', compact('userType'));
})->name('home');

//Additional routes

//Subject module
Route::post('/subject/create', 'SubjectController@store');
Route::post('/grade/create', 'GradeController@store');
Route::get('/subject-grades', 'SubjectController@grades');
Route::post('/subject-grades/add', 'SubjectController@assignGrade');


//Student module
Route::get('/students', 'TeacherController@students');
Route::get('/student-enroll', 'TeacherController@studentEnroll');
Route::post('/student-subject/create', 'TeacherController@addStudentSubject');

//Resources
Route::resource('/subject', 'SubjectController');
Route::resource('/grade', 'GradeController');
