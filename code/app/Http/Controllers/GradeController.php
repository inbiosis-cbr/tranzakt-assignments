<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = \App\Grade::all();

        return view('adminlte.teacher.grade.list')
            ->withGrades($grades)
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
            'grade.name' => 'required|max:255',
            'grade.code' => 'required|max:30',
            'grade.score' => 'required',
        ]);

        $newItem = \App\Grade::firstOrCreate(
            $request->input('grade')
        );
        return redirect(url('teacher/grade'));

        //Not applicable
        return response()->json([
            'grade' => $newItem->getAttributes()
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
        $grade = \App\Grade::find($id);
        return response()->json([
            'html' => View::make('adminlte.teacher.grade.forms.update')
                ->withGrade($grade)
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
            'grade.name' => 'required|max:255',
            'grade.code' => 'required|max:30',
            'grade.score' => 'required',
        ]);

        $updateItem = \App\Grade::find($id);
        $updateItem->update($request->input('grade'));
        return redirect(url('teacher/grade'));

        //Not applicable
        return response()->json([
            'grade' => $updateItem->getAttributes()
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
}
