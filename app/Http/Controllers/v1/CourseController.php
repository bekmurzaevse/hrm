<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Course\CreateAction;
use App\Actions\v1\Course\DeleteAction;
use App\Actions\v1\Course\IndexAction;
use App\Actions\v1\Course\ShowAction;
use App\Actions\v1\Course\UpdateAction;
use App\Dto\v1\Course\CreateDto;
use App\Dto\v1\Course\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Course\CreateRequest;
use App\Http\Requests\v1\Course\UpdateRequest;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\Course\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Course\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Course\CreateRequest $request
     * @param \App\Actions\v1\Course\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\Course\UpdateRequest $request
     * @param \App\Actions\v1\Course\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Course\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}