<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Test\CreateAction;
use App\Actions\v1\Test\DeleteAction;
use App\Actions\v1\Test\IndexAction;
use App\Actions\v1\Test\ShowAction;
use App\Actions\v1\Test\UpdateAction;
use App\Dto\v1\Test\CreateDto;
use App\Dto\v1\Test\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Test\CreateRequest;
use App\Http\Requests\v1\Test\UpdateRequest;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\Test\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Test\CreateRequest $request
     * @param \App\Actions\v1\Test\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Test\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\Test\UpdateRequest $request
     * @param \App\Actions\v1\Test\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Test\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}