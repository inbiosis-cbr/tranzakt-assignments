<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

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

    /**
     * Get content for student subject edit.
     *
     * @param  integer  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editStudentSubject($id, Request $request)
    {
        $studentSubject = \App\StudentSubject::find($id);
        return response()->json([
            'html' => View::make('adminlte.teacher.student.forms.mark-student-subject')
                ->withStudentSubject($studentSubject)
                ->render()
        ]);
    }

    /**
     * Mark grade to student subject
     *
     * @param  integer  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function markStudentSubject($id, Request $request)
    {
        $validatedData = $request->validate([
            'studentGrade.grade_id' => 'required',
        ]);

        $studentSubject = \App\StudentSubject::find($id);
        $newItem = \App\StudentGrade::firstOrCreate(
            $request->input('studentGrade'),
            [
                'student_subject_id' => $studentSubject->id,
                'graded_by' => \Auth::guard('teacher')->user()->id,
            ]
        );
        return redirect(url('teacher/student-enroll') . '?id=' . $studentSubject->student_id);

        //Not applicable
        return response()->json([
            'studentGrade' => $newItem->getAttributes()
        ]);
    }
}
