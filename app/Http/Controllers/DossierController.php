<?php

namespace App\Http\Controllers;

use App\Dossier;
use Illuminate\Http\Request;

class DossierController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function init(Request $request)
    {
        $user = auth()->user();

        $dossier = Dossier::create([
            'path_to_cv' => NULL,
            'path_to_cover_letter' => NULL,
            'path_to_transcript' => NULL,
            'path_to_print_screen_ent' => NULL,
            'path_to_registration_form' => NULL,
            'student_id' => $user->student->id
        ]);

        $dossier->save();
        $user->student->dossier()->save($dossier);
        
        $request->session()->flash('success', 'Votre dossier  bien été créé, vous pouvez dès à présent téléverser vos documents dans la section \'Mon Dossier\'');

        return redirect()->action('StudentsController@index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function show(Dossier $dossier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function edit(Dossier $dossier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dossier $dossier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dossier $dossier)
    {
        //
    }
}
