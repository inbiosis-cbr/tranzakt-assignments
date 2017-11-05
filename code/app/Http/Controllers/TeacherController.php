<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function students()
    {
        $students = \App\Student::all();

        return view('adminlte.teacher.student.list')
            ->withStudents($students)
            ->withUserType('teacher');
    }

    /**
     * Manage student subjects
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function studentEnroll(Request $request)
    {
        $student = \App\Student::find($request->input('id'));
        $subjects = \App\Subject::orderBy('name')->get();

        return view('adminlte.teacher.student.enroll')
            ->withStudent($student)
            ->withSubjects($subjects)
            ->withUserType('teacher');
    }

    /**
     * Assign subject to student.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addStudentSubject(Request $request)
    {
        $validatedData = $request->validate([
            'studentSubject.student_id' => 'required',
            'studentSubject.subject_id' => 'required',
        ]);

        $newItem = \App\StudentSubject::firstOrCreate(
            $request->input('studentSubject')
        );
        return redirect(url('teacher/student-enroll') . '?id=' . $newItem->student_id);

        //Not applicable
        return response()->json([
            'studentSubject' => $newItem->getAttributes()
        ]);
    }
}
