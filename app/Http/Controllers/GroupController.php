<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Http\Resources\UniversalResource;
use App\Interfaces\GroupInterface;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct(protected GroupInterface $groupInterface){}
    public function index()
    {
       return $this->groupInterface->index();
    }
    public function store(GroupRequest $request)
    {
       return $this->groupInterface->store($request);
    }
    public function update(GroupUpdateRequest $request, $id)
    {
        return $this->update($request,$id);
    }
    public function destroy($id)
    {
       return $this->groupInterface->destroy($id);
    }
    public function changeActive($id)
    {
       return $this->groupInterface->changeActive($id);
    }
}
