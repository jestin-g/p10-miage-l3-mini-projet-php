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
     * Get the student profile owner
     * 
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the profile student dossier
    */
    public function dossier()
    {
        return $this->hasOne('App\Dossier');
    }

    public function hasDossier()
    {
        return $this->dossier()->exists();
    }
}
