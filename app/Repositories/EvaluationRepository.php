<?php

namespace App\Repositories;

use App\Http\Requests\EvaluationRequest;
use App\Http\Requests\EvaluationUpdateRequest;
use App\Http\Resources\UniversalResource;
use App\Interfaces\EvaluationInterface;
use App\Models\Evaluation;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class EvaluationRepository implements EvaluationInterface
{
    public function index()
    {
        $search = request('search');
        $perPage = request('per_page', 15);
        $dates = request('dates', []);

        $evaluation = Evaluation::join('lessons', 'evaluations.lesson_id', 'lessons.id')
            ->join('students', 'evaluations.student_id', 'students.id')
            ->join('groups', 'lessons.group_id', 'groups.id')
            ->join('subjects', 'groups.subject_id', 'subjects.id')
            ->join('teachers', 'groups.teacher_id', 'teachers.id')
            ->select(
                'evaluations.id',
                'subjects.subject_name',
                'groups.group_name',
                'lessons.title',
                'lessons.description',
                'teachers.teacher_name',
                'students.student_name',
                'evaluations.score',
                'evaluations.created_at'
            )
            ->when($search, function ($query) use ($search) {
                $query->where('lessons.title', 'LIKE', "%$search%")
                    ->orWhere('students.student_name', 'LIKE', "%$search%")
                    ->orWhere('groups.group_name', 'LIKE', "%$search%")
                    ->orWhere('subjects.subject_name', 'LIKE', "%$search%")
                    ->orWhere('teachers.teacher_name', 'LIKE', "%$search%");
            })
            ->when($dates, function ($query) use ($dates) {
                $query->whereDate('evaluations.created_at', $dates);
            })
            ->simplePaginate($perPage);

        return UniversalResource::collection($evaluation);
    }
    public function store(EvaluationRequest $request)
    {
        DB::beginTransaction();
        try {
            $lessonId = $request->lesson_id;
            $student = Student::where('students.id', $request->student_id)
                ->with("groupToStudent", function ($query) {
                    $query->with(['lesson']);
                })
                ->first();

            if ($student->groupToStudent?->lesson?->id != $lessonId) {
                return response()->json(["message" => "Ushbu o'quvchi guruhda mavjud emas!"], 404);
            }

            $rating = $student->rating;

            $count = Evaluation::where('lesson_id', $request->lesson_id)
                ->where('student_id', $request->student_id)
                ->whereDate('created_at', now()->toDateString())
                ->count();
            if ($count < 2) {
                Evaluation::create([
                    'lesson_id' => $request->lesson_id,
                    'score' => $request->score,
                    'student_id' => $request->student_id
                ]);
            } else {
                return response()->json(['message' => "Bir o'quvchini 2 martadan ortiq baholab bo'lmaydi "], 400);
            }
            $newRating = $rating + $request->score;

            $student->update([
                'rating' => $newRating
            ]);
            DB::commit();
            return response()->json(['message' => "Amaliyot bajarildi"], 201);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'message' => "O'quvchilarni baholashda xatolik sodir bo'ldi",
                'error' => $exception->getMessage(),
                'line' => $exception->getLine(),
                'file' => $exception->getFile()
            ], 500);
        }
    }
    public function update(EvaluationUpdateRequest $request, $id)
    {
        $evaluation = Evaluation::where('evaluations.id', $id)->first();

        if (!$evaluation) {
            return response()->json(['message' => "Bunday ma'lumot topilmadi"], 404);
        }

        $student = $evaluation->student_id;
        $score = $evaluation->score;

        $resaultRating = $request->score - $score;

        $evaluation->update([
            'score' => $request->score,
        ]);

        $studentRating = Student::where('students.id', $student)->first();
        $rating = $studentRating->rating;

        $newRating =  $rating + ($resaultRating);

        $studentRating->update([
            'rating' => $newRating
        ]);

        return response()->json(['message' => "Ma'lumot yangilandi"], 200);
    }
    public function destroy($id)
    {

        $evaluation = Evaluation::find($id);

        $student_id = $evaluation->student_id;
        $score = $evaluation->score;

        if (!$evaluation) {
            return response()->json(['message' => "$id-ID li ma'lumot topilmadi"], 404);
        }

        $student = Student::where('students.id', $student_id)->first();

        $rating = $student->rating;
        $newRating = $rating - $score;

        $student->update([
            'rating' => $newRating
        ]);

        $evaluation->delete();

        return response()->json([
            'message' => "Ma'lumot o'chirildi",
            'delete' => $evaluation
        ], 200);
    }
}
