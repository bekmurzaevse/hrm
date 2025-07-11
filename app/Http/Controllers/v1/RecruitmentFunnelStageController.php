<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\RecruitmentFunnelStage\CreateAction;
use App\Actions\v1\RecruitmentFunnelStage\DeleteAction;
use App\Actions\v1\RecruitmentFunnelStage\IndexAction;
use App\Actions\v1\RecruitmentFunnelStage\ShowAction;
use App\Actions\v1\RecruitmentFunnelStage\UpdateAction;
use App\Dto\v1\RecruitmentFunnelStage\CreateDto;
use App\Dto\v1\RecruitmentFunnelStage\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\RecruitmentFunnelStage\CreateRequest;
use App\Http\Requests\v1\RecruitmentFunnelStage\UpdateRequest;
use Illuminate\Http\JsonResponse;

class RecruitmentFunnelStageController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\RecruitmentFunnelStage\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\RecruitmentFunnelStage\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\RecruitmentFunnelStage\CreateRequest $request
     * @param \App\Actions\v1\RecruitmentFunnelStage\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\RecruitmentFunnelStage\UpdateRequest $request
     * @param \App\Actions\v1\RecruitmentFunnelStage\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\RecruitmentFunnelStage\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}
