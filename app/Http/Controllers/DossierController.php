<?php

namespace App\Http\Controllers;

use App\Dossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        // Store file in the directory named by the user id
        $path = $request->file('file')->store('public/'.$user->id);

        $dossier = Dossier::firstWhere('student_id', $user->student->id);
        switch ($request->file_type)
        {
            case 'path_to_cv':
                $dossier->path_to_cv = $path;
                break;

            case 'path_to_cover_letter':
                $dossier->path_to_cover_letter = $path;
                break;
            
            case 'path_to_transcript':
                $dossier->path_to_transcript = $path;
                break;
            
            case 'path_to_print_screen_ent':
                $dossier->path_to_print_screen_ent = $path;
                break;
            
            case 'path_to_registration_form':
                $dossier->path_to_registration_form = $path;
                break;

            default:
            $request->session()->flash('error', 'Erreur l\'or de l\'importation de votre fichier');
                break;
        }

        $dossier->save();
    
        return redirect()->action('StudentsController@index');
    }

    public function deleteFile(Request $request)
    {
        $user = auth()->user();

        $dossier = Dossier::firstWhere('student_id', $user->student->id);
        switch ($request->file_type)
        {
            case 'path_to_cv':
                Storage::delete($dossier->path_to_cv);
                $dossier->path_to_cv = NULL;
                break;

            case 'path_to_cover_letter':
                Storage::delete($dossier->path_to_cover_letter);
                $dossier->path_to_cover_letter = NULL;
                break;
            
            case 'path_to_transcript':
                Storage::delete($dossier->path_to_transcript);
                $dossier->path_to_transcript = NULL;
                break;
            
            case 'path_to_print_screen_ent':
                Storage::delete($dossier->path_to_print_screen_ent);
                $dossier->path_to_print_screen_ent = NULL;
                break;
            
            case 'path_to_registration_form':
                Storage::delete($dossier->path_to_registration_form);
                $dossier->path_to_registration_form = NULL;
                break;

            default:
            $request->session()->flash('error', 'Erreur l\'or de l\'importation de votre fichier');
                break;
        }

        $dossier->save();
    
        return redirect()->action('StudentsController@index');
    }
}
