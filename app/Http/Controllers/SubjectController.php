<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Http\Resources\UniversalResource;
use App\Interfaces\SubjectInterface;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function __construct(protected SubjectInterface $subjectInterface){}
    public function SelectTeachaerSubjects(){
        return $this->subjectInterface->SelectTeachaerSubjects();
    }
    public function index()
    {
        return $this->subjectInterface->index();
    }
    public function store(SubjectRequest $request)
    {
       return $this->subjectInterface->store( $request);
    }
    public function update(SubjectRequest $request, $id)
    {
        return $this->subjectInterface->update($request,$id);
    }
    public function destroy($id)
    {
        return $this->subjectInterface->destroy($id);
    }
}
