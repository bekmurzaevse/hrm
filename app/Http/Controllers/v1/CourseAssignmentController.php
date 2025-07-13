<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\CourseAssignment\CompleteAction;
use App\Actions\v1\CourseAssignment\CreateAction;
use App\Actions\v1\CourseAssignment\DeleteAction;
use App\Actions\v1\CourseAssignment\IndexAction;
use App\Actions\v1\CourseAssignment\ShowAction;
use App\Actions\v1\CourseAssignment\UpdateAction;
use App\Dto\v1\CourseAssignment\CreateDto;
use App\Dto\v1\CourseAssignment\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CourseAssignment\CreateRequest;
use App\Http\Requests\v1\CourseAssignment\UpdateRequest;
use Illuminate\Http\JsonResponse;

class CourseAssignmentController extends Controller
{
    
    /**
     * Summary of index
     * @param \App\Actions\v1\CourseAssignment\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\CourseAssignment\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\CourseAssignment\CreateRequest $request
     * @param \App\Actions\v1\CourseAssignment\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\CourseAssignment\UpdateRequest $request
     * @param \App\Actions\v1\CourseAssignment\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of complete
     * @param int $id
     * @param \App\Actions\v1\CourseAssignment\CompleteAction $action
     * @return JsonResponse
     */
    public function complete(int $id, CompleteAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\CourseAssignment\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}