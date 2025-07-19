<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\CourseMaterial\CreateAction;
use App\Actions\v1\CourseMaterial\DeleteAction;
use App\Actions\v1\CourseMaterial\DownloadAction;
use App\Actions\v1\CourseMaterial\IndexAction;
use App\Actions\v1\CourseMaterial\ShowAction;
use App\Actions\v1\CourseMaterial\UpdateAction;
use App\Dto\v1\CourseMaterial\CreateDto;
use App\Dto\v1\CourseMaterial\DeleteDto;
use App\Dto\v1\CourseMaterial\DownloadDto;
use App\Dto\v1\CourseMaterial\IndexDto;
use App\Dto\v1\CourseMaterial\ShowDto;
use App\Dto\v1\CourseMaterial\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CourseMaterial\CreateRequest;
use App\Http\Requests\v1\CourseMaterial\DeleteRequest;
use App\Http\Requests\v1\CourseMaterial\DownloadRequest;
use App\Http\Requests\v1\CourseMaterial\IndexRequest;
use App\Http\Requests\v1\CourseMaterial\ShowRequest;
use App\Http\Requests\v1\CourseMaterial\UpdateRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CourseMaterialController extends Controller
{

    
    public function index(IndexRequest $request, IndexAction $action): JsonResponse
    {
        return $action(IndexDto::from($request));
    }

    
    public function show(int $id, ShowRequest $request, ShowAction $action): JsonResponse
    {
        return $action($id, ShowDto::from($request));
    }

    
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    
    public function download(int $id, DownloadRequest $request, DownloadAction $action): StreamedResponse
    {
        return $action($id, DownloadDto::from(request: $request));
    }

    public function delete(int $id, DeleteRequest $request, DeleteAction $action): JsonResponse
    {
        return $action($id, DeleteDto::from($request));
    }
}