<?php
namespace App\Interfaces;

use App\Http\Requests\EvaluationRequest;
use App\Http\Requests\EvaluationUpdateRequest;

interface EvaluationInterface{
    function index();
    function store(EvaluationRequest $request);
    function update(EvaluationUpdateRequest $request, $id);
    function destroy($id);
}
