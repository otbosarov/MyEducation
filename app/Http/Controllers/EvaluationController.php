<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvaluationRequest;
use App\Http\Requests\EvaluationUpdateRequest;
use App\Interfaces\EvaluationInterface;


class EvaluationController extends Controller
{
    public function __construct(protected EvaluationInterface $evaluationInterface) {}
    public function index()
    {
        return $this->evaluationInterface->index();
    }
    public function store(EvaluationRequest $request)
    {
        return $this->evaluationInterface->store($request);
    }
    public function update(EvaluationUpdateRequest $request, $id)
    {
        return $this->evaluationInterface->update($request, $id);
    }
    public function destroy($id)
    {
        return $this->evaluationInterface->destroy($id);
    }
}
