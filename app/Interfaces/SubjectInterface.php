<?php
namespace App\Interfaces;

use App\Http\Requests\SubjectRequest;

interface SubjectInterface{
    function SelectTeachaerSubjects();
    function index();
    function store(SubjectRequest $request);
    function update(SubjectRequest $request, $id);
    function destroy($id);
}
