<?php

namespace App\Actions\v1\Application;

use App\Exceptions\ApiResponseException;
use App\Models\Application;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DeleteAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try {
            $data = Application::findOrFail($id);
            $data->delete();

            return static::toResponse(
                message: 'Application Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Application Not Found', 404);
        }
    }
}