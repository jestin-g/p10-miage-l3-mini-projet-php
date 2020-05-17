<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidacy extends Model
{
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
