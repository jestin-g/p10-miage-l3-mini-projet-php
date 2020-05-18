<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\CandidacyStatus;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $candidacies = $this->getAllCandidacies();
        return view('teacher.index', compact('candidacies'));
    }

    public function showCandidacy($id)
    {
        $candidacy = $this->getCandidacyById($id);
        $dossier = Dossier::where('student_id', $candidacy->student_id)->first();
        $dossier = $dossier->getFilledFilesArray();
        foreach ($dossier as $key => $value)
        {
            $value = Storage::url($value);
        }
        $statuses = CandidacyStatus::all();
        return view('teacher.one_candidacy', [
            'candidacy' => $candidacy,
            'dossier' => $dossier,
            'statuses' => $statuses,
        ]);
    }

    public function updateCandidacy(Request $request, $id)
    {

    }

    public function getAllCandidacies()
    {
        $candidacies = DB::table('candidacies')
                           ->select('*', 'candidacies.id as candidacy_id', 'candidacy_grades.label as grade_label', 'candidacy_statuses.label as status_label')
                           ->join('candidacy_grades', 'candidacies.candidadcy_grade_id', '=', 'candidacy_grades.id')
                           ->join('candidacy_statuses', 'candidacies.candidacy_status_id', '=', 'candidacy_statuses.id')
                           ->join('students', 'candidacies.student_id', '=', 'students.id')
                           ->get();
        return $candidacies;
    }

    public function getCandidacyById($id)
    {
        $candidacy = DB::table('candidacies')
                           ->select('*', 'candidacies.id as candidacy_id', 'students.id as student_id', 'candidacy_grades.label as grade_label', 'candidacy_statuses.label as status_label', 'candidacy_statuses.id as status_id')
                           ->join('candidacy_grades', 'candidacies.candidadcy_grade_id', '=', 'candidacy_grades.id')
                           ->join('candidacy_statuses', 'candidacies.candidacy_status_id', '=', 'candidacy_statuses.id')
                           ->join('students', 'candidacies.student_id', '=', 'students.id')
                           ->where('candidacies.id', '=', $id)
                           ->first();
        return $candidacy;
    }
}
