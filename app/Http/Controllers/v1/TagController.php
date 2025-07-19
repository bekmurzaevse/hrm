<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Tag\CreateAction;
use App\Actions\v1\Tag\DeleteAction;
use App\Actions\v1\Tag\IndexAction;
use App\Actions\v1\Tag\ShowAction;
use App\Actions\v1\Tag\UpdateAction;
use App\Dto\v1\Tag\CreateDto;
use App\Dto\v1\Tag\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Tag\CreateRequest;
use App\Http\Requests\v1\Tag\UpdateRequest;
use Illuminate\Http\JsonResponse;

class TagController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\Tag\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Tag\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Tag\CreateRequest $request
     * @param \App\Actions\v1\Tag\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\Tag\UpdateRequest $request
     * @param \App\Actions\v1\Tag\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Tag\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }


}
