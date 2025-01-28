<?php

namespace App\Interfaces;

use App\Http\Requests\GroupRequest;
use App\Http\Requests\GroupUpdateRequest;

interface GroupInterface {
    function index();
    function store(GroupRequest $request);
    function update(GroupUpdateRequest $request, $id);
    function destroy($id);
    function changeActive($id);
}
