<?php
namespace App\Repositories;
use App\Http\Requests\SubjectRequest;
use App\Http\Resources\UniversalResource;
use App\Interfaces\SubjectInterface;
use App\Models\Subject;

class SubjectRepository implements SubjectInterface
{
    public function index()
    {
        $perPage = request('per_page', 15);
        $search = request('search');

        $subject = Subject::when($search, function ($query) use ($search) {
            $query->where('subjects.subject_name', 'LIKE', "%$search%");
        })
            ->simplePaginate($perPage);
        return UniversalResource::collection($subject);
    }
    public function store(SubjectRequest $request)
    {
            Subject::create([
                'subject_name' => $request->subject_name,
            ]);
            return response()->json(['message' => "Ma'lumot qo'shildi"], 201);

    }
    public function update(SubjectRequest $request, $id)
    {
        $subject =  Subject::where('id', $id)->first();

        if (!$subject) {
            return response()->json(['message' => "Bunday ma'lumot topilmadi"], 404);
        }
        $subject->update([
            'subject_name' => $request->subject_name ?? $subject->subject_name
        ]);
        return response()->json(['message' => "Ma'lumot yangilandi"], 200);
    }
    public function destroy($id)
    {
        $subject = Subject::find($id);
        if (!$subject) {
            return response()->json(['message' => "Bu $id li ma'lumot topilmadi"], 404);
        }
        $subject->delete();

        return response()->json([
            'message' => "Ma'lumot o'chirildi",
            "subject" => $subject
        ], 200);
    }
}
