<?php 

namespace App\Actions\v1\Client;

use App\Exceptions\ApiResponseException;
use App\Models\Client;
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
            $client = Client::findOrFail($id);
            $client->delete();

            return static::toResponse(
                message: 'Client Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Client Not Found', 404);
        }
    }
}