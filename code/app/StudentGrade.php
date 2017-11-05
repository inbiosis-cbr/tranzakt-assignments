<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGrade extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_grades';

    protected $guarded = [''];

    public function grade()
    {
        return $this->belongsTo('App\Grade', 'grade_id');
    }

    public function studentSubject()
    {
        return $this->belongsTo('App\StudentSubject', 'student_subject_id');
    }
}
