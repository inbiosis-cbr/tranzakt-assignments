<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('student')->user();

    //dd($users);
    $userType = 'student';
    return view('adminlte.student.home', compact('userType'));
})->name('home');
