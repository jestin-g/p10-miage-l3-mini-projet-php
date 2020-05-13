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

    public function uploadFile(Request $request)
    {
        $user = auth()->user();

        // Get file from request
        $file = $request->file('file');

        // Store file in the directory named by the user name
        $path = $request->file('file')->store($user->name);

        $dossier = Dossier::firstWhere('student_id', $user->student->id);
        $dossier->path_to_cv = $path;
        $dossier->save();
    
        return redirect()->action('StudentsController@index');
    }
}
