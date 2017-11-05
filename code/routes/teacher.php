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
Route::get('/subject-grades', 'SubjectController@grades');
Route::post('/subject/create', 'SubjectController@store');
Route::post('/grade/create', 'GradeController@store');

Route::resource('/subject', 'SubjectController');
Route::resource('/grade', 'GradeController');
