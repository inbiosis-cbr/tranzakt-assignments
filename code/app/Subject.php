<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subjects';

    protected $guarded = [''];

    public function grades()
    {
        return $this->belongsToMany('App\Grade', 'subject_grades', 'subject_id', 'grade_id');
    }
}
