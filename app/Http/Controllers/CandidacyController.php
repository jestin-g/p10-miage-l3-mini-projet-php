<?php

namespace App\Http\Controllers;

use App\Candidacy;
use App\CandidacyGrade;
use App\CandidacyStatus;
use Illuminate\Http\Request;

class CandidacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $candidacies = Candidacy::all();
    }

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
        auth()->user()->student->candidacy()->save($candidacy);

        auth()->user()->student->candidacy->status()->save($status);

        auth()->user()->student->candidacy->grade()->save($grade);

        $request->session()->flash('success', 'Votre candidature a bien été reçue !');

        return redirect()->action('StudentsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
