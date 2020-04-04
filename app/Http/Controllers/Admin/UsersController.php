<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

use App\User;
use App\Role;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $user->roles()->sync($request->roles);
        
        $user->email = $request->email;
        $user->name = $request->name;

        if($user->save())
        {
            $request->session()->flash('success', 'L\'utilisateur a bien été mis à jour ('.$user->name.')');
        }
        else
        {
            $request->session()->flash('error', 'Une erreur s\'est produite lors de la mise à jour de l\'utilisateur ('.$user->name.')');
        }
        
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        $user->roles()->detach();

        $tmp_name = $user->name;

        if($user->delete())
        {
            $request->session()->flash('success', 'L\'utilisateur a bien été supprimé ('.$tmp_name.')');
        }
        else
        {
            $request->session()->flash('error', 'Une erreur s\'est produite lors de la suppression de l\'utilisateur ('.$tmp_name.')');
        }

        return redirect()->route('admin.users.index');
    }
}
