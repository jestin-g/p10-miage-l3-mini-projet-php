<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidacy extends Model
{

    protected $fillable = ['student_id', 'candidacy_status_id', 'candidadcy_grade_id'];

    /**
     * Get the candidacy's owner
     * 
     */
    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    /**
     * Get the candidacy's grade
    */
    public function grade()
    {
        return $this->hasOne('App\CandidacyGrade');
    }

    /**
     * Get the candidacy's status
    */
    public function status()
    {
        return $this->hasOne('App\CandidacyStatus');
    }
}