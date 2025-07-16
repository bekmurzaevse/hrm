<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\CandidateNote\CreateAction;
use App\Actions\v1\CandidateNote\DeleteAction;
use App\Actions\v1\CandidateNote\IndexAction;
use App\Actions\v1\CandidateNote\ShowAction;
use App\Actions\v1\CandidateNote\UpdateAction;
use App\Dto\v1\CandidateNote\CreateDto;
use App\Dto\v1\CandidateNote\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CandidateNote\CreateRequest;
use App\Http\Requests\v1\CandidateNote\UpdateRequest;
use Illuminate\Http\JsonResponse;

class CandidateNoteController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\CandidateNote\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\CandidateNote\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\CandidateNote\CreateRequest $request
     * @param \App\Actions\v1\CandidateNote\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\CandidateNote\UpdateRequest $request
     * @param \App\Actions\v1\CandidateNote\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\CandidateNote\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}