<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Deals\CreateAction;
use App\Actions\v1\Deals\DeleteAction;
use App\Actions\v1\Deals\IndexAction;
use App\Http\Controllers\Controller;
use App\Actions\v1\Deals\ShowAction;
use App\Actions\v1\Deals\UpdateAction;
use App\Dto\v1\Deals\CreateDto;
use App\Dto\v1\Deals\UpdateDto;
use App\Http\Requests\v1\Deals\CreateRequest;
use App\Http\Requests\v1\Deals\UpdateRequest;
use Illuminate\Http\JsonResponse;

class DealsController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\Deals\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Deals\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Deals\CreateRequest $request
     * @param \App\Actions\v1\Deals\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\Deals\UpdateRequest $request
     * @param \App\Actions\v1\Deals\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Deals\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }


}
