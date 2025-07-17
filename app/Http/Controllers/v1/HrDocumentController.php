<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\HrDocument\CreateAction;
use App\Actions\v1\HrDocument\DeleteAction;
use App\Actions\v1\HrDocument\DownloadAction;
use App\Actions\v1\HrDocument\IndexAction;
use App\Actions\v1\HrDocument\ShowAction;
use App\Actions\v1\HrDocument\UpdateAction;
use App\Dto\v1\HrDocument\CreateDto;
use App\Dto\v1\HrDocument\DeleteDto;
use App\Dto\v1\HrDocument\DownloadDto;
use App\Dto\v1\HrDocument\IndexDto;
use App\Dto\v1\HrDocument\ShowDto;
use App\Dto\v1\HrDocument\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\HrDocument\CreateRequest;
use App\Http\Requests\v1\HrDocument\DeleteRequest;
use App\Http\Requests\v1\HrDocument\DownloadRequest;
use App\Http\Requests\v1\HrDocument\IndexRequest;
use App\Http\Requests\v1\HrDocument\ShowRequest;
use App\Http\Requests\v1\HrDocument\UpdateRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class HrDocumentController extends Controller
{

    /**
     * Summary of index
     * @param \App\Http\Requests\v1\HrDocument\IndexRequest $request
     * @param \App\Actions\v1\HrDocument\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexRequest $request, IndexAction $action): JsonResponse
    {
        return $action(IndexDto::from($request));
    }

    public function show(int $id, ShowRequest $request, ShowAction $action): JsonResponse
    {
        return $action($id, ShowDto::from($request));
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\HrDocument\CreateRequest $request
     * @param \App\Actions\v1\HrDocument\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\HrDocument\UpdateRequest $request
     * @param \App\Actions\v1\HrDocument\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Http\Requests\v1\HrDocument\DeleteRequest $request
     * @param \App\Actions\v1\HrDocument\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteRequest $request, DeleteAction $action): JsonResponse
    {
        return $action($id, DeleteDto::from($request));
    }

    /**
     * Summary of download
     * @param int $id
     * @param \App\Http\Requests\v1\HrDocument\DownloadRequest $request
     * @param \App\Actions\v1\HrDocument\DownloadAction $action
     * @return StreamedResponse
     */
    public function download(int $id, DownloadRequest $request, DownloadAction $action): StreamedResponse
    {
        return $action($id, DownloadDto::from(request: $request));
    }
}
