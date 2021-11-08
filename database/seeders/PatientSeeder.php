<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\patient;
class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        patient::factory()
        ->count(300)
        ->create();
    }
}
