<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create([
            'subject_name' => 'Matematika'
        ]);
        Subject::create([
            'subject_name' => 'Fizika'
        ]);
        Subject::create([
            'subject_name' => 'Dasturlash'
        ]);
        Subject::create([
            'subject_name' => 'Frontend'
        ]);
        Subject::create([
            'subject_name' => 'Backend'
        ]);
        Subject::create([
            'subject_name' => 'Kimyo'
        ]);
        Subject::create([
            'subject_name' => 'Web dasturlash'
        ]);
        Subject::create([
            'subject_name' => 'Kiber xavfsizlik'
        ]);
        Subject::create([
            'subject_name' => 'Sun\'iy intelekt'
        ]);
        Subject::create([
            'subject_name' => 'Geometriya'
        ]);
        Subject::create([
            'subject_name' => 'Rus tili'
        ]);
        Subject::create([
            'subject_name' => 'Ingliz tili'
        ]);
        Subject::create([
            'subject_name' => 'Ona tili'
        ]);
        Subject::create([
            'subject_name' => 'Adabiyot'
        ]);
        Subject::create([
            'subject_name' => 'Tarix'
        ]);
        Subject::create([
            'subject_name' => 'Dinshunoslik'
        ]);
        Subject::create([
            'subject_name' => 'Biologiya'
        ]);
        Subject::create([
            'subject_name' => 'Chqbt'
        ]);
        Subject::create([
            'subject_name' => 'Chizmachilik'
        ]);
        Subject::create([
            'subject_name' => 'Kores tili'
        ]);
        Subject::create([
            'subject_name' => 'Kompyuter savodxonligi'
        ]);
    }
}
