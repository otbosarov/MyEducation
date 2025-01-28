<?php

namespace App\Repositories;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Http\Resources\UniversalResource;
use App\Interfaces\StudentInterface;
use App\Models\Student;
use Database\Factories\StudentFactory;
use Illuminate\Support\Facades\DB;

class StudentRepository implements StudentInterface
{

    public function index()
    {
        $perPage = request('per_page', 15);
        $search = request('search');

        $student = Student::when($search, function ($query) use ($search) {
            $query->where('students.student_name', 'LIKE', "%$search%");
        })
            ->simplePaginate($perPage);
        return UniversalResource::collection($student);
    }
    public function store(StudentRequest $request)
    {
        try {
            Student::create([
                'student_name' => $request->student_name,
                'gender' => $request->gender,
                'phone' => $request->phone,
            ]);
            return response()->json(['message' => "Amaliyot bajarildi"], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => "Ma'lumot kiritishda xatolik",
                'error' => $exception->getMessage(),
                'line' => $exception->getLine(),
                'file' => $exception->getFile(),
            ], 500);
        }
    }
    public function update(StudentUpdateRequest $request, $id)
    {
        $student = Student::where('id', $id)->first();
        $student->update([
            'student_name' => $request->student_name ?? $student->student_name,
            'phone' => $request->phone ?? $student->phone,
            'rating' => $request->rating ?? $student->rating,
        ]);
        return response()->json(['message' => "Ma'lumot yangilandi"], 200);
    }
    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => "Bu $id li ma'lumot topilmadi"], 404);
        }
        $student->delete();
        return response()->json([
            'message' => "Ma'lumot o'chirildi",
            "student" => $student
        ], 200);
    }
    public function ratingShow()
    {
        $search = request('search');
        $perPage = request('per_page', 15);

        $student = Student::when($search, function ($query) use ($search) {
            $query->where('students.student_name', 'LIKE', "%$search%");
        })
            ->orderBy('rating', 'desc')
            ->simplePaginate($perPage);
        return UniversalResource::collection($student);
    }
    public function highestStudentShow()
    {
        $student = Student::orderBy('rating', 'desc')
            ->limit(10)
            ->get();
        return UniversalResource::collection($student);
    }
    public function addStudentFactory()
    {
        $fakeStudentCount = request('fake_student_count', 1);
        Student::factory()->count($fakeStudentCount)->create();

        return response()->json(['message' => "Kiritgan miqdorizcha fake ma'lumotga to'ldirildi jadval!"], 201);
    }
}
