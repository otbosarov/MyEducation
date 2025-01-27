<?php

namespace App\Repositories;

use App\Http\Requests\GroupToStudentRequest;
use App\Http\Resources\UniversalResource;
use App\Interfaces\GroupToStudentInterface;
use App\Models\Group;
use App\Models\GroupToStudent;
use Illuminate\Http\Request;

class GroupToStudentRepository implements GroupToStudentInterface
{
    public function index($id)
    {
        $perPage = request('per_page', 15);
        $search = request('search');

        $group = Group::where('groups.id', $id)
            ->with(['studentToGroup.students'])
            ->orderBy('id', 'asc')
            ->simplePaginate($perPage);
        return UniversalResource::collection($group);
    }
    public function store(GroupToStudentRequest $request)
    {
        try {
            $studentCount = GroupToStudent::where('group_id', $request->group_id)->count();
            if ($studentCount >= 24) {
                return response()->json([
                    'message' => "Ushbu guruhga 24 dan ortiq o'quvchi qo'shish mumkin emas"
                ], 400);
            }

            GroupToStudent::create([
                'group_id' => $request->group_id,
                'student_id' => $request->student_id
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => "Guruhga o'quvchi qo'shishda xatolik sodir bo'ldi",
                'error' => $exception->getMessage(),
                'line' => $exception->getLine(),
                'file' => $exception->getFile(),
            ], 500);
        }
        return response()->json(['message' => "Guruhga yangi o'quvchi qo'shildi"], 201);
    }
}
