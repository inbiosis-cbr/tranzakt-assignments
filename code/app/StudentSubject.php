<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_subjects';

    protected $guarded = [''];

    public function subject()
    {
        return $this->belongsTo('App\Subject', 'subject_id');
    }

    public function gradeOptions()
    {
        return $this->belongsToMany('App\Grade', 'subject_grades', 'subject_id', 'grade_id');
    }

    public function subjectGrade()
    {
        return $this->hasOne('App\StudentGrade', 'student_subject_id');
    }
}
