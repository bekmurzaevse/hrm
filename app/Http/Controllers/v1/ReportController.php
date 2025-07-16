<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Report\CreateAction;
use App\Actions\v1\Report\DeleteAction;
use App\Actions\v1\Report\DownloadAction;
use App\Actions\v1\Report\IndexAction;
use App\Actions\v1\Report\ShowAction;
use App\Actions\v1\Report\UpdateAction;
use App\Dto\v1\Report\CreateDto;
use App\Dto\v1\Report\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Report\CreateRequest;
use App\Http\Requests\v1\Report\UpdateRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\Report\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Report\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Report\CreateRequest $request
     * @param \App\Actions\v1\Report\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\Report\UpdateRequest $request
     * @param \App\Actions\v1\Report\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Report\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of download
     * @param int $id
     * @param \App\Actions\v1\Report\DownloadAction $action
     * @return StreamedResponse
     */
    public function download(int $id, DownloadAction $action): StreamedResponse
    {
        return $action($id);
    }
}
