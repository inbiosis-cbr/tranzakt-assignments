<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('student')->user();

    //dd($users);
    $userType = 'student';

    return view('adminlte.student.subjects')
        ->withSubjects(Auth::guard('student')->user()->subjects)
        ->withUserType($userType);

    //return view('adminlte.student.results', compact('userType'));
})->name('home');
