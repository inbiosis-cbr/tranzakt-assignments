<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = \App\Subject::all();

        return view('adminlte.teacher.subject.list')
            ->withSubjects($subjects)
            ->withUserType('teacher');
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
        $validatedData = $request->validate([
            'subject.name' => 'required|max:255',
            'subject.code' => 'required|max:30',
        ]);

        $newSubject = \App\Subject::firstOrCreate(
            $request->input('subject')
        );
        return redirect(url('teacher/subject'));

        //Not applicable
        return response()->json([
            'subject' => $newSubject->getAttributes()
        ]);
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
        $subject = \App\Subject::find($id);
        return response()->json([
            'html' => View::make('adminlte.teacher.subject.forms.update')
                ->withSubject($subject)
                ->render()
        ]);
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
        $validatedData = $request->validate([
            'subject.name' => 'required|max:255',
            'subject.code' => 'required|max:30',
        ]);

        $updateItem = \App\Subject::find($id);
        $updateItem->update($request->input('subject'));
        return redirect(url('teacher/subject'));

        //Not applicable
        return response()->json([
            'subject' => $updateItem->getAttributes()
        ]);
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
     * Show list of grades assigned to this resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function grades(Request $request)
    {
        $subject = \App\Subject::find($request->input('id'));
        $grades = \App\Grade::orderBy('name')->get();
        return view('adminlte.teacher.subject.grades')
            ->withSubject($subject)
            ->withGrades($grades)
            ->withUserType('teacher');
    }

    /**
     * Assign grade to subject
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assignGrade(Request $request)
    {
        $validatedData = $request->validate([
            'grade.grade_id' => 'required',
            'grade.subject_id' => 'required',
        ]);

        $newItem = \App\SubjectGrade::firstOrCreate(
            $request->input('grade')
        );
        return redirect(url('teacher/subject-grades') . '?id=' . $request->input('grade.subject_id'));

        //Not applicable
        return response()->json([
            'subjectGrade' => $newItem->getAttributes()
        ]);
    }
}
