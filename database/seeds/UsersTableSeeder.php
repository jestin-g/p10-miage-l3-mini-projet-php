<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $admin = User::create([
            'name' => 'Administrateur',
            'email' => 'admin@parisnanterre.fr',
            'password' => Hash::make('admin')
        ]);

        $teacher = User::create([
            'name' => 'Enseignant 1',
            'email' => 'enseignant1@parisnanterre.fr',
            'password' => Hash::make('password')
        ]);

        $student = User::create([
            'name' => 'Etudiant 1',
            'email' => 'etu1@parisnanterre.fr',
            'password' => Hash::make('password')
        ]);

        $adminRole = Role::where('name', 'administrateur')->first();
        $teacherRole = Role::where('name', 'enseignant')->first();
        $studentRole = Role::where('name', 'etudiant')->first();

        $admin->roles()->attach($adminRole);
        $teacher->roles()->attach($teacherRole);
        $student->roles()->attach($studentRole);
    }
}
