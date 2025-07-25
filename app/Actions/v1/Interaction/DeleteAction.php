<?php 

namespace App\Actions\v1\Interaction;

use App\Exceptions\ApiResponseException;
use App\Models\Interaction;
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
            $interaction = Interaction::findOrFail($id);
            $interaction->delete();

            return static::toResponse(
                message: 'Interaction Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Interaction Not Found', 404);
        }
    }
}