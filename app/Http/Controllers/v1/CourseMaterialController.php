<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\CourseMaterial\CreateAction;
use App\Actions\v1\CourseMaterial\DeleteAction;
use App\Actions\v1\CourseMaterial\IndexAction;
use App\Actions\v1\CourseMaterial\ShowAction;
use App\Actions\v1\CourseMaterial\UpdateAction;
use App\Dto\v1\CourseMaterial\CreateDto;
use App\Dto\v1\CourseMaterial\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CourseMaterial\CreateRequest;
use App\Http\Requests\v1\CourseMaterial\UpdateRequest;
use Illuminate\Http\JsonResponse;

class CourseMaterialController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\CourseMaterial\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }
    
    /**
     * Summary of create
     * @param \App\Http\Requests\v1\CourseMaterial\CreateRequest $request
     * @param \App\Actions\v1\CourseMaterial\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\CourseMaterial\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\CourseMaterial\UpdateRequest $request
     * @param \App\Actions\v1\CourseMaterial\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\CourseMaterial\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}