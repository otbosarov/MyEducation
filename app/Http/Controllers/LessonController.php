<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Http\Resources\UniversalResource;
use App\Interfaces\LessonInterface;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function __construct(protected LessonInterface $lessonInterface) {}
    public function index()
    {
        return $this->lessonInterface->index();
    }
    public function store(LessonRequest $request)
    {
        return $this->lessonInterface->store($request);
    }
    public function update(LessonRequest $request, $id)
    {
        return $this->lessonInterface->update($request, $id);
    }
    public function destroy($id)
    {
        return $this->lessonInterface->destroy($id);
    }
    public function changeActive($id)
    {
        return $this->lessonInterface->changeActive($id);
    }
}
