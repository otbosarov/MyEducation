<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'student_name' => "Abdullox O'tbosarov",
            'gender' => 'male',
            'phone' => "+998 91 695 50 31"
        ]);
        Student::create([
            'student_name' => "Nurullo Ergashev",
            'gender' => 'male',
            'phone' => "+998 97 888 12 13"
        ]);
        Student::create([
            'student_name' => "Otabek Shokirov",
            'gender' => 'male',
            'phone' => "+998 90 058 90 04"
        ]);
        Student::create([
            'student_name' => "Ahmadullo Abdurahimov",
            'gender' => 'male',
            'phone' => "+998 91 151 90 04"
        ]);
        Student::create([
            'student_name' => "Ilhomjon Obidov",
            'gender' => 'male',
            'phone' => "+998 91 082 00 05"
        ]);
        Student::create([
            'student_name' => "Charos Abdusalomova",
            'gender' => 'female',
            'phone' => "+998 94 556 78 12"
        ]);

    }
}
