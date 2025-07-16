<?php

namespace App\Actions\v1\Finance;

use App\Exceptions\ApiResponseException;
use App\Models\Finance;
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
            $data = Finance::findOrFail($id);
            $data->delete();

            return static::toResponse(
                message: 'Finance Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Finance Not Found', 404);
        }
    }
}