<?php

namespace App\Http\Controllers;

use App\Candidacy;
use App\CandidacyGrade;
use App\CandidacyStatus;
use Illuminate\Http\Request;

class CandidacyController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = CandidacyStatus::where('label', 'reçu en attente de validation des documents')->first();
        $grade = CandidacyGrade::find($request->grade)->first();

        $candidacy = Candidacy::create([
            'student_id' => auth()->user()->student->id,
            'candidadcy_grade_id' => $request->grade,
            'candidacy_status_id' => $status->id,
        ]);

        $candidacy->save();

        $request->session()->flash('success', 'Votre candidature a bien été reçue !');

        return redirect()->action('StudentsController@index');
    }
    
}
