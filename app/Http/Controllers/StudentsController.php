<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Student;
use App\User;

class StudentsController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        if ($user->hasStudent())
        {
            $student = $user->student;
            return view('student.index', compact('student'));
        }
        else
        {
            return view('student.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $student = Student::create([
            'name' => '',
            'surname' => '',
            'num_student_card' => '',
            'birth_date' => Carbon::today(),
            'address' => '',
            'phone_number' => '',
            'user_id' => $user->id
        ]);

        if($student->save() && $user->student()->save($student))
        {
            $request->session()->flash('success', 'Votre profil  bien été créé, vous pouvez dès à présent renseigner vos informations dans la section \'Mon Profil\'');
        }
        else
        {
            $request->session()->flash('error', 'Une erreur s\'est produite lors de la création de votre profil');
        }

        return view('home');
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
        //
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
