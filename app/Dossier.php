<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Dossier extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path_to_cv', 'path_to_cover_letter', 'path_to_transcript', 'path_to_print_screen_ent', 'path_to_registration_form', 'student_id'];

    /**
     * Get the student dossier's owner
     * 
     */
    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function getNullFilesArray()
    {
        $res = array();
        foreach ($this->toArray() as $key => $value)
        {
            if (preg_match('/^path_.*$/', $key) && $value === NULL)
            {
                $res[$key] = $value;
            }
        }
        return $res;
    }

    public function getFilledFilesArray()
    {
        $res = array();
        foreach ($this->toArray() as $key => $value)
        {
            if (preg_match('/^path_.*$/', $key) && $value != NULL)
            {
                $res[$key] = Storage::url($value);
            }
        }
        return $res;
    }
}
