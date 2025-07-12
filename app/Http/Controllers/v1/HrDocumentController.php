<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\HrDocument\CreateAction;
use App\Actions\v1\HrDocument\DeleteAction;
use App\Actions\v1\HrDocument\DownloadAction;
use App\Actions\v1\HrDocument\IndexAction;
use App\Actions\v1\HrDocument\ShowAction;
use App\Actions\v1\HrDocument\UpdateAction;
use App\Dto\v1\HrDocument\CreateDto;
use App\Dto\v1\HrDocument\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\HrDocument\CreateRequest;
use App\Http\Requests\v1\HrDocument\UpdateRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class HrDocumentController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\HrDocument\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\HrDocument\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
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
     * @param \App\Actions\v1\HrDocument\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of download
     * @param int $id
     * @param \App\Actions\v1\HrDocument\DownloadAction $action
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function download(int $id, DownloadAction $action): StreamedResponse
    {
        return $action($id);
    }
}
