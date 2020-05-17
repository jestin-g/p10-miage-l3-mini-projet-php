<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'num_student_card', 'birth_date', 'address', 'phone_number', 'user_id',
    ];

    /**
     * Get the profile student owner
     * 
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the profile student's dossier
    */
    public function dossier()
    {
        return $this->hasOne('App\Dossier');
    }

    /**
     * Get the profile student's candidacy
    */
    public function candidacy()
    {
        return $this->hasOne('App\Candidacy');
    }

    public function hasDossier()
    {
        return $this->dossier()->exists();
    }

    public function hasCandidacy()
    {
        return $this->candidacy()->exists();
    }
}
