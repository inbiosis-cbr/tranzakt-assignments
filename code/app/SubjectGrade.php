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

    /**
     * Scope a query to only include by subject.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBySubject($query, $subject_id)
    {
        return $query->where('subject_id', $subject_id);
    }

    /**
     * Scope a query to only include by grade.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByGrade($query, $grade_id)
    {
        return $query->where('grade_id', $grade_id);
    }
}
