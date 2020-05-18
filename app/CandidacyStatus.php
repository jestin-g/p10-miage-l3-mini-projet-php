<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidacyStatus extends Model
{
    protected $fillable = ['label'];

    // public function candidacies()
    // {
    //     return $this->belongsToMany('App\Candidacy');
    // }
}
