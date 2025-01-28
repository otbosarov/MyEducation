<?php
namespace App\Interfaces;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentUpdateRequest;

interface StudentInterface
{
    function index();
    function store(StudentRequest $request);
    function update(StudentUpdateRequest $request, $id);
    function destroy($id);
    function ratingShow();
    function highestStudentShow();  
    function addStudentFactory();

}
