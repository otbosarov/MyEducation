<?php

namespace App\Interfaces;

use App\Http\Requests\LessonRequest;

interface LessonInterface
{
    function index();
    function store(LessonRequest $request);
    function update(LessonRequest $request, $id);
    function destroy($id);
    function changeActive($id);
}
