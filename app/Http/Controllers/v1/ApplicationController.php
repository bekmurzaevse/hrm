<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Application\CreateAction;
use App\Actions\v1\Application\DeleteAction;
use App\Actions\v1\Application\IndexAction;
use App\Actions\v1\Application\ShowAction;
use App\Actions\v1\Application\UpdateAction;
use App\Dto\v1\Application\CreateDto;
use App\Dto\v1\Application\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Application\CreateRequest;
use App\Http\Requests\v1\Application\UpdateRequest;
use Illuminate\Http\JsonResponse;

class ApplicationController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\Application\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Application\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Application\CreateRequest $request
     * @param \App\Actions\v1\Application\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\Application\UpdateRequest $request
     * @param \App\Actions\v1\Application\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Application\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}
