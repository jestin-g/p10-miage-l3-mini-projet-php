<?php

use Illuminate\Database\Seeder;

use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create(['name' => 'administrateur']);
        Role::create(['name' => 'enseignant']);
        Role::create(['name' => 'etudiant']);
    }
}
