<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\TestResult\CreateAction;
use App\Actions\v1\TestResult\DeleteAction;
use App\Actions\v1\TestResult\IndexAction;
use App\Actions\v1\TestResult\ShowAction;
use App\Actions\v1\TestResult\UpdateAction;
use App\Dto\v1\TestResult\CreateDto;
use App\Dto\v1\TestResult\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\TestResult\CreateRequest;
use App\Http\Requests\v1\TestResult\UpdateRequest;
use Illuminate\Http\JsonResponse;

class TestResultController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\TestResult\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\TestResult\CreateRequest $request
     * @param \App\Actions\v1\TestResult\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\TestResult\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\TestResult\UpdateRequest $request
     * @param \App\Actions\v1\TestResult\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\TestResult\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}