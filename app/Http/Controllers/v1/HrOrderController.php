<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\HrOrder\CreateAction;
use App\Actions\v1\HrOrder\DeleteAction;
use App\Actions\v1\HrOrder\DownloadAction;
use App\Actions\v1\HrOrder\IndexAction;
use App\Actions\v1\HrOrder\ShowAction;
use App\Actions\v1\HrOrder\UpdateAction;
use App\Dto\v1\HrOrder\CreateDto;
use App\Dto\v1\HrOrder\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\HrOrder\CreateRequest;
use App\Http\Requests\v1\HrOrder\UpdateRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class HrOrderController extends Controller
{
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    public function show(int $id, ShowAction $action)
    {
        return $action($id);
    }

    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }

    public function download(int $id, DownloadAction $action): StreamedResponse
    {
        return $action($id);
    }

}
