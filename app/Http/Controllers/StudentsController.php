<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Student;
use App\User;

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
                $data['dossier'] = $student->dossier;
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

        return redirect()->action('StudentsController@index');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
