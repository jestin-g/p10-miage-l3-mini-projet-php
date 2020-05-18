<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidacyGrade extends Model
{
    protected $fillable = ['label'];

    // public function candidacies()
    // {
    //     return $this->belongsToMany('App\Candidacy');
    // }
}
