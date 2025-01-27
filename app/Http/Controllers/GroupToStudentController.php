<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupToStudentRequest;
use App\Http\Resources\UniversalResource;
use App\Interfaces\GroupToStudentInterface;
use App\Models\Group;
use App\Models\GroupToStudent;
use Illuminate\Http\Request;


class GroupToStudentController extends Controller
{
    public function __construct(protected GroupToStudentInterface $groupToStudentInterface) {}
    public function index($id)
    {
        return $this->groupToStudentInterface->index($id);
    }
    public function store(GroupToStudentRequest $request)
    {
        return $this->groupToStudentInterface->store($request);
    }
    public function update(Request $request,$id){
        return $this->groupToStudentInterface->update($request,$id);
    }
}
