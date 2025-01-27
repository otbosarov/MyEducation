<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::create([
            'teacher_name' => "SaidBurhon Tohirov",
            'gender' => "male",
            'phone' => "+998 99 594 44 47"
        ]);
        Teacher::create([
            'teacher_name' => "Dilshodbek Abdullayev",
            'gender' => "male",
            'phone' => "+998 90 160 23 96"
        ]);
        Teacher::create([
            'teacher_name' => "Jasurbek Xursanov",
            'gender' => "male",
            'phone' => "+998 91 155 64 18"
        ]);
        Teacher::create([
            'teacher_name' => "Ne'matov Javlonbek",
            'gender' => "male",
            'phone' => "+998 90 344 50 21"
        ]);
        Teacher::create([
            'teacher_name' => "Muhsinjon Ibrohimov",
            'gender' => "male",
            'phone' => "+998 91 146 56 66"
        ]);

    }
}
