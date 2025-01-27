<?php

namespace App\Interfaces;

use App\Http\Requests\GroupToStudentRequest;
use Illuminate\Http\Request;

interface GroupToStudentInterface
{
    function index($id);
    function store(GroupToStudentRequest $request);
}
