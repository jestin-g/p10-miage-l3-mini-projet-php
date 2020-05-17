<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        $data = array();

        if ($user->hasStudent())
        {
            $student = $user->student;
            $data['student'] = $student;

            if ($student->hasDossier())
            {
                $dossier = $student->dossier;
                $data['dossier'] = $dossier;
                $data['dossierNullFiles'] = $dossier->getNullFilesArray();
                $data['dossierFilledFiles'] = $dossier->getFilledFilesArray();

                foreach ($data['dossierFilledFiles'] as $key => $value)
                {
                    $value = Storage::url($value);
                }

                /* PAS DU TOUT PROPRE -> ERREURE DE CONCEPTION BDD */
                $labels = array(
                    'path_to_cv' => 'CV',
                    'path_to_cover_letter' => 'Lettre de motivation',
                    'path_to_transcript' => 'Relevé de notes (année dernière)',
                    'path_to_print_screen_ent' => 'Capture d\'écran ENT (année en cours)',
                    'path_to_registration_form' => 'Formulaire d\'inscription',
                );
                $data['files_labels'] = $labels;
            }
        }
            return view('student.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function init(Request $request)
    {
        $user = auth()->user();

        $student = Student::create([
            'name' => NULL,
            'surname' => NULL,
            'num_student_card' => NULL,
            'birth_date' => NULL,
            'address' => NULL,
            'phone_number' => NULL,
            'user_id' => $user->id
        ]);

        $student->save();
        $user->student()->save($student);
        
        $request->session()->flash('success', 'Votre profil  bien été créé, vous pouvez dès à présent renseigner vos informations dans la section \'Mon Profil\'');

        return redirect()->action('StudentsController@edit', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student, Request $request)
    {
        if ($student == auth()->user()->student)
        {
            return view('student.edit', compact('student'));
        }

        $request->session()->flash('error', 'Vous ne pouvez accéder au profil de quelqu\'un d\'autre !');
        return redirect()->action('StudentsController@index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());

        return redirect()->action('StudentsController@index');
    }
}
