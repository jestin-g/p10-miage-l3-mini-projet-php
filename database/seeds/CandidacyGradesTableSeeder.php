<?php

use Illuminate\Database\Seeder;

use App\CandidacyGrade;

class CandidacyGradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CandidacyGrade::truncate();
        CandidacyGrade::create(['label' => 'l3 classique']);
        CandidacyGrade::create(['label' => 'l3 apprentissage']);
        CandidacyGrade::create(['label' => 'm1 classique']);
        CandidacyGrade::create(['label' => 'm1 apprentissage']);
        CandidacyGrade::create(['label' => 'm2 classique']);
        CandidacyGrade::create(['label' => 'm2 apprentissage']);
    }
}
