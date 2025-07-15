<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Finance\CreateAction;
use App\Actions\v1\Finance\DeleteAction;
use App\Actions\v1\Finance\IndexAction;
use App\Actions\v1\Finance\ShowAction;
use App\Actions\v1\Finance\UpdateAction;
use App\Dto\v1\Finance\CreateDto;
use App\Dto\v1\Finance\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Finance\CreateRequest;
use App\Http\Requests\v1\Finance\UpdateRequest;
use Illuminate\Http\JsonResponse;

class FinanceController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\Finance\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Finance\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Finance\CreateRequest $request
     * @param \App\Actions\v1\Finance\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\Finance\UpdateRequest $request
     * @param \App\Actions\v1\Finance\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Finance\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}
