<?php
namespace App\Interfaces;

use App\Http\Requests\TeacherRequest;
use App\Http\Requests\TeacherUpdateRequest;

interface TeacherInterface
{
    function index();
    function store(TeacherRequest $request);
    function update(TeacherUpdateRequest $request, $id);
    function destroy($id);
}
