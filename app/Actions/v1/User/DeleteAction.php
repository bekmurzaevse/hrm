<?php

namespace App\Actions\v1\User;

use App\Exceptions\ApiResponseException;
use App\Models\User;
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
            $user = User::findOrFail($id);
            $user->delete();

            return static::toResponse(
                message: 'User Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('User Not Found', 404);
        }
    }
}
