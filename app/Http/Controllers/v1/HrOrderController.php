<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\HrOrder\CreateAction;
use App\Actions\v1\HrOrder\DeleteAction;
use App\Actions\v1\HrOrder\DownloadAction;
use App\Actions\v1\HrOrder\IndexAction;
use App\Actions\v1\HrOrder\ShowAction;
use App\Actions\v1\HrOrder\UpdateAction;
use App\Dto\v1\HrOrder\CreateDto;
use App\Dto\v1\HrOrder\DeleteDto;
use App\Dto\v1\HrOrder\DownloadDto;
use App\Dto\v1\HrOrder\IndexDto;
use App\Dto\v1\HrOrder\ShowDto;
use App\Dto\v1\HrOrder\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\HrOrder\CreateRequest;
use App\Http\Requests\v1\HrOrder\DeleteRequest;
use App\Http\Requests\v1\HrOrder\DownloadRequest;
use App\Http\Requests\v1\HrOrder\IndexRequest;
use App\Http\Requests\v1\HrOrder\ShowRequest;
use App\Http\Requests\v1\HrOrder\UpdateRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class HrOrderController extends Controller
{

    /**
     * Summary of index
     * @param \App\Http\Requests\v1\HrOrder\IndexRequest $request
     * @param \App\Actions\v1\HrOrder\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexRequest $request, IndexAction $action): JsonResponse
    {
        return $action(IndexDto::from($request));
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Http\Requests\v1\HrOrder\ShowRequest $request
     * @param \App\Actions\v1\HrOrder\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowRequest $request, ShowAction $action): JsonResponse
    {
        return $action($id, ShowDto::from($request));
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\HrOrder\CreateRequest $request
     * @param \App\Actions\v1\HrOrder\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\HrOrder\UpdateRequest $request
     * @param \App\Actions\v1\HrOrder\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\HrOrder\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteRequest $request, DeleteAction $action): JsonResponse
    {
        return $action($id, DeleteDto::from($request));
    }

    /**
     * Summary of download
     * @param int $id
     * @param \App\Http\Requests\v1\HrOrder\DownloadRequest $request
     * @param \App\Actions\v1\HrOrder\DownloadAction $action
     * @return StreamedResponse
     */
    public function download(int $id, DownloadRequest $request, DownloadAction $action): StreamedResponse
    {
        return $action($id, DownloadDto::from($request));
    }

}
