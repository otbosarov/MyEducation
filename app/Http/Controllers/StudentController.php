<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Http\Resources\UniversalResource;
use App\Interfaces\StudentInterface;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(protected StudentInterface $studentInterface){}
    public function index()
    {
        return $this->studentInterface->index();
    }
    public function store(StudentRequest $request)
    {
        return $this->studentInterface->store($request);
    }
    public function update(StudentUpdateRequest $request, $id)
    {
        return $this->studentInterface->update($request,$id);
    }
    public function destroy($id)
    {
        return $this->studentInterface->destroy($id);
    }
    public function ratingShow()
    {
        return $this->studentInterface->ratingShow();
    }
    public function addStudentFactory(){
        return $this->studentInterface->addStudentFactory();
    }
}
