<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\FunnelLog\CreateAction;
use App\Actions\v1\FunnelLog\DeleteAction;
use App\Actions\v1\FunnelLog\IndexAction;
use App\Actions\v1\FunnelLog\ShowAction;
use App\Actions\v1\FunnelLog\UpdateAction;
use App\Dto\v1\FunnelLog\CreateDto;
use App\Dto\v1\FunnelLog\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\FunnelLog\CreateRequest;
use App\Http\Requests\v1\FunnelLog\UpdateRequest;
use Illuminate\Http\JsonResponse;

class FunnelLogController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\FunnelLog\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\FunnelLog\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\FunnelLog\CreateRequest $request
     * @param \App\Actions\v1\FunnelLog\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\FunnelLog\UpdateRequest $request
     * @param \App\Actions\v1\FunnelLog\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\FunnelLog\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}
