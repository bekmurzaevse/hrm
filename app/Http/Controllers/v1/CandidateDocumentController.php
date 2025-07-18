<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\CandidateDocument\CreateAction;
use App\Actions\v1\CandidateDocument\DeleteAction;
use App\Actions\v1\CandidateDocument\DownloadAction;
use App\Actions\v1\CandidateDocument\IndexAction;
use App\Actions\v1\CandidateDocument\ShowAction;
use App\Actions\v1\CandidateDocument\UpdateAction;
use App\Dto\v1\CandidateDocument\CreateDto;
use App\Dto\v1\CandidateDocument\DeleteDto;
use App\Dto\v1\CandidateDocument\DownloadDto;
use App\Dto\v1\CandidateDocument\IndexDto;
use App\Dto\v1\CandidateDocument\ShowDto;
use App\Dto\v1\CandidateDocument\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CandidateDocument\CreateRequest;
use App\Http\Requests\v1\CandidateDocument\DeleteRequest;
use App\Http\Requests\v1\CandidateDocument\DownloadRequest;
use App\Http\Requests\v1\CandidateDocument\IndexRequest;
use App\Http\Requests\v1\CandidateDocument\ShowRequest;
use App\Http\Requests\v1\CandidateDocument\UpdateRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CandidateDocumentController extends Controller
{

    /**
     * Summary of index
     * @param \App\Http\Requests\v1\CandidateDocument\IndexRequest $request
     * @param \App\Actions\v1\CandidateDocument\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexRequest $request, IndexAction $action): JsonResponse
    {
        return $action(IndexDto::from($request));
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Http\Requests\v1\CandidateDocument\ShowRequest $request
     * @param \App\Actions\v1\CandidateDocument\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowRequest $request, ShowAction $action): JsonResponse
    {
        return $action($id, ShowDto::from($request));
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
     * @param \App\Http\Requests\v1\CandidateDocument\DownloadRequest $request
     * @param \App\Actions\v1\CandidateDocument\DownloadAction $action
     * @return StreamedResponse
     */
    public function download(int $id, DownloadRequest $request, DownloadAction $action): StreamedResponse
    {
        return $action($id, DownloadDto::from(request: $request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Http\Requests\v1\CandidateDocument\DeleteRequest $request
     * @param \App\Actions\v1\CandidateDocument\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteRequest $request, DeleteAction $action): JsonResponse
    {
        return $action($id, DeleteDto::from($request));
    }
}