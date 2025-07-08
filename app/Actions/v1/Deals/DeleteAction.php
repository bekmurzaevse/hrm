<?php 

namespace App\Actions\v1\Deals;

use App\Exceptions\ApiResponseException;
use App\Models\Deals;
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
            $deals = Deals::findOrFail($id);
            $deals->delete();

            return static::toResponse(
                message: 'Deals Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Deals Not Found', 404);
        }
    }
}