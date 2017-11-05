<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectGrade extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subject_grades';

    protected $guarded = [''];

    public function grade()
    {
        return $this->belongsTo('App\Grade', 'grade_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject', 'subject_id');
    }
}
