<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\CandidateDocument\CreateAction;
use App\Actions\v1\CandidateDocument\DeleteAction;
use App\Actions\v1\CandidateDocument\DownloadAction;
use App\Actions\v1\CandidateDocument\IndexAction;
use App\Actions\v1\CandidateDocument\ShowAction;
use App\Actions\v1\CandidateDocument\UpdateAction;
use App\Dto\v1\CandidateDocument\CreateDto;
use App\Dto\v1\CandidateDocument\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CandidateDocument\CreateRequest;
use App\Http\Requests\v1\CandidateDocument\UpdateRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CandidateDocumentController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\CandidateDocument\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\CandidateDocument\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\CandidateDocument\CreateRequest $request
     * @param \App\Actions\v1\CandidateDocument\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\CandidateDocument\UpdateRequest $request
     * @param \App\Actions\v1\CandidateDocument\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of download
     * @param int $id
     * @param \App\Actions\v1\CandidateDocument\DownloadAction $action
     * @return StreamedResponse
     */
    public function download(int $id, DownloadAction $action): StreamedResponse
    {
        return $action($id);
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\CandidateDocument\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}