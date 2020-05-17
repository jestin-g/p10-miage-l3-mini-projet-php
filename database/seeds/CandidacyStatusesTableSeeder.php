<?php

use Illuminate\Database\Seeder;

use App\CandidacyStatus;

class CandidacyStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CandidacyStatus::truncate();
        CandidacyStatus::create(['label' => 'reçu']);
        CandidacyStatus::create(['label' => 'reçu incomplet en attente de complément']);
        CandidacyStatus::create(['label' => 'validé complet']);
        CandidacyStatus::create(['label' => 'entretien']);
        CandidacyStatus::create(['label' => 'accepté']);
        CandidacyStatus::create(['label' => 'refusé']);
        CandidacyStatus::create(['label' => 'liste d\'attente']);
    }
}
