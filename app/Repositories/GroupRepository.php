<?php

namespace App\Repositories;

use App\Http\Requests\GroupRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Http\Resources\UniversalResource;
use App\Interfaces\GroupInterface;
use App\Models\Group;

class GroupRepository implements GroupInterface
{
    public function index()
    {
        $search = request('search');
        $perPage = request('per_page', 15);

        $group = Group::join('subjects', 'groups.subject_id', 'subjects.id')
            ->join('teachers', 'groups.teacher_id', 'teachers.id')
            ->where('groups.active', true)
            ->select(
                'groups.id',
                'groups.group_name',
                'subjects.subject_name',
                'teachers.teacher_name'
            )
            ->orderBy('id', 'desc')
            ->when($search, function ($query) use ($search) {
                $query->where('group_name', 'LIKE', "%$search%");
            })
            ->simplePaginate($perPage);

        return UniversalResource::collection($group);
    }
    public function store(GroupRequest $request)
    {
        try {
            Group::create([
                'group_name' => $request->group_name,
                'subject_id' => $request->subject_id,
                'teacher_id' => $request->teacher_id,
            ]);
            return response()->json(['message' => 'Amaliyot bajarildi'], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => "Guruh yaratishda xatolik yuzaga keldi",
                'error' => $exception->getMessage(),
                'line' => $exception->getLine(),
                'file' => $exception->getFile(),
            ], 500);
        }
    }
    public function update(GroupUpdateRequest $request, $id)
    {
        $group = Group::where('id', $id)->first();

        if (!$group) {
            return response()->json(['message' => "Bunday ma'lumot topilmadi"], 404);
        }
        $group->update([
            'subject_id' => $request->subject_id ?? $group->subject_id,
            'teacher_id' => $request->teacher_id ?? $group->teacher_id,
        ]);
        return response()->json(['message' => "Ma'lumot yangilandi"], 200);
    }
    public function destroy($id)
    {
        $group = Group::find($id);
        if (!$group) {
            return response()->json(['message' => "Bu $id li ma'lumot mavjud emas"], 404);
        }
        $group->delete();

        return response()->json([
            'message' => "Ma'lumot o'chirildi",
            'delete' => $group
        ], 200);
    }
    public function changeActive($id)
    {
        $group = Group::find($id);
        if (!$group) {
            return response()->json(['message' => "Bu $id li ma'lumot topilmadi"], 404);
        }
        $group->active = !$group->active;
        $group->save();
        return response()->json(['message' => "Amaliyot bajarildi"], 200);
    }
}
