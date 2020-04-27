<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Student;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        if(auth()->user()->hasRole('administrateur'))
        {
            $users = User::all();
            return view('admin.users.index', compact('users'));
        }
        elseif (auth()->user()->hasRole('etudiant'))
        {
            return redirect()->action('StudentsController@index');
        }
    }
}
