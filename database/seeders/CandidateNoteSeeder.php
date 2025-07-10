<?php

namespace Database\Seeders;

use App\Models\CandidateNote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CandidateNote::create([
            'candidate_id' => 1, 
            'user_id' => 1,      
            'note' => 'Intervyuda jaqsi qatnasti, biraq texnik bilimler azlaw.',
        ]);

        CandidateNote::create([
            'candidate_id' => 2,
            'user_id' => 1,
            'note' => 'Prezentatsiya juda jaqsi boldi. Analitik dunya qaras bar.',
        ]);

        CandidateNote::create([
            'candidate_id' => 3,
            'user_id' => 2,
            'note' => 'Juda tajribeli, biraq komanda menen islewde passiv.',
        ]);
    }
}
