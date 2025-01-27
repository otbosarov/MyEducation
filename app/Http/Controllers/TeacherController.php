<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Http\Requests\TeacherUpdateRequest;
use App\Http\Resources\UniversalResource;
use App\Interfaces\TeacherInterface;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct(protected TeacherInterface $teacherInterface){}
    public function index()
    {
        return $this->teacherInterface->index();
    }
    public function store(TeacherRequest $request)
    {
        return $this->teacherInterface->store($request);
    }
    public function update(TeacherUpdateRequest $request, $id)
    {
        return $this->teacherInterface->update($request,$id);
    }
    public  function destroy($id)
    {
        return $this->teacherInterface->destroy($id);
    }
}
