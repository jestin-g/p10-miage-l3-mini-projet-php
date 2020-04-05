<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * Get the student dossier's owner
     * 
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
