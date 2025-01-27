<?php

namespace App\Repositories;

use App\Http\Requests\TeacherRequest;
use App\Http\Requests\TeacherUpdateRequest;
use App\Http\Resources\UniversalResource;
use App\Interfaces\TeacherInterface;
use App\Models\Teacher;


class TeacherRepository implements TeacherInterface
{
    public function index()
    {
        $search =  request('search');
        $perPage = request('per_page', 15);

        $teacher = Teacher::when($search, function ($query) use ($search) {
            $query->where('teachers.teacher_name', 'LIKE', "%$search%");
        })
            ->simplePaginate($perPage);
        return UniversalResource::collection($teacher);
    }
    public function store(TeacherRequest $request)
    {
        try {
            Teacher::create([
                'teacher_name' => $request->teacher_name,
                'gender' => $request->gender,
                'phone' => $request->phone,
            ]);
            return response()->json(['message' => 'Amaliyot bajarildi'], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => "Ma'lumot qo'shishda xatolik",
                'error' => $exception->getMessage(),
                'line' => $exception->getLine(),
                'file' => $exception->getFile(),
            ], 500);
        }
    }
    public function update(TeacherUpdateRequest $request, $id)
    {
        $teacher = Teacher::where('id', $id)->first();

        if (!$teacher) {
            return response()->json(['message' => "Bunday ma'lumot topilmadi"], 404);
        }
        $teacher->update([
            'teacher_name' => $request->teacher_name ?? $teacher->teacher_name,
            'phone' => $request->phone ?? $teacher->phone,
        ]);
        return response()->json(['message' => "Ma'lumot yangilandi"], 200);
    }
    public  function destroy($id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return response()->json(['message' => "Bu $id li ma'lumot topilmadi"], 404);
        }
        $teacher->delete();

        return response()->json([
            'message' => "Ma'lumot o'chirildi",
            "teacher" => $teacher
        ], 200);
    }
}
