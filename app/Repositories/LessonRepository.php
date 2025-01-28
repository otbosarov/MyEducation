<?php

namespace App\Repositories;

use App\Http\Requests\LessonRequest;
use App\Http\Resources\UniversalResource;
use App\Interfaces\LessonInterface;
use App\Models\Lesson;

class LessonRepository implements LessonInterface
{
    public function index()
    {
        $search = request('search');
        $perPage = request('per_page', 15);

        $startDate = request('startDate');
        $endDate = request('endDate');

        $lesson = Lesson::join('groups', 'lessons.group_id', 'groups.id')
            ->join('subjects', 'groups.subject_id', 'subjects.id')
            ->join('teachers', 'groups.teacher_id', 'teachers.id')
            ->where('lessons.active', true)
            ->select(
                'lessons.id',
                'subjects.subject_name',
                'lessons.description',
                'groups.group_name',
                'teachers.teacher_name',
                'lessons.created_at'
            )
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereDate('lessons.created_at', '>=', $startDate)
                    ->whereDate('lessons.created_at', '<=', $endDate);
            })
            ->when($search, function ($query) use ($search) {
                $query->where('lessons.description', 'LIKE', "%$search%")
                    ->orWhere('groups.group_name', 'LIKE', "%$search%");
            })
            ->simplePaginate($perPage);
        return UniversalResource::collection($lesson);
    }
    public function store(LessonRequest $request)
    {
        try {
            Lesson::create([
                'title' => $request->title,
                'description' => $request->description,
                'group_id' => $request->group_id,
            ]);
            return response()->json(['message' => "Amaliyot bajarildi"], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => "Ma'lumot kiritishda xatolik vujudga keldi",
                'error' => $exception->getMessage(),
                'line' => $exception->getLine(),
                'file' => $exception->getFile(),
            ], 500);
        }
    }
    public function update(LessonRequest $request, $id)
    {
        $lesson = Lesson::where('id', $id)->first();
        if (!$lesson) {
            return response()->json(['message' => "Bunday ma'lumot topilmadi"], 404);
        }
        $lesson->update([
            'title' => $request->title ?? $lesson->title,
            'description' => $request->description ?? $lesson->description,
            'group_id' => $request->group_id ?? $lesson->group_id,
        ]);
        return response()->json(['message' => "Ma'lumot yangilandi"], 200);
    }
    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        if (!$lesson) {
            return response()->json(['message' => "Bu $id li ma'lumot topilmadi"], 404);
        }
        $lesson->delete();
        return response()->json([
            'message' => "Ma'lumot o'chirildi",
            'delete' => $lesson
        ], 200);
    }
    public function changeActive($id)
    {
        $lesson = Lesson::find($id);
        if (!$lesson) {
            return response()->json(['message' => "Bu $id li ma'lumot topilmadi"], 404);
        }
        $lesson->active = !$lesson->active;
        $lesson->save();
        return response()->json(['message' => "Amaliyot bajarildi"], 200);
    }
    public function OneDayLessons()
    {

        $startDate = request('startDate');
        $endDate = request('endDate');

        $lesson = Lesson::join('groups', 'lessons.group_id', 'groups.id')
            ->join('subjects', 'groups.subject_id', 'subjects.id')
            ->join('teachers', 'groups.teacher_id', 'teachers.id')
            ->where('lessons.active', true)
            ->select(
                'lessons.id',
                'subjects.subject_name',
                'lessons.description',
                'groups.group_name',
                'teachers.teacher_name',
                'lessons.created_at'
            )
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereDate('lessons.created_at', '>=', $startDate)
                    ->whereDate('lessons.created_at', '<=', $endDate);
            })
            ->get();
        return $lesson;
    }
}
