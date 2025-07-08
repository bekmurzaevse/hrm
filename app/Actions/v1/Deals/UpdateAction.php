<?php 

namespace App\Actions\v1\Deals;

use App\Dto\v1\Deals\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Deals\DealsResource;
use App\Models\Deals;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;
    
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $deals = Deals::with(['client'])->findOrFail($id);
            $deals->update([
                'client_id' => $dto->clientId,
                'stage' => $dto->stage ?? $deals->stage,
                'value' => $dto->value,
                'description' => $dto->description ?? $deals->description,
            ]);

            return static::toResponse(
                message: 'Delas Updated',
                data: new DealsResource($deals)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Deals Not Found', 404);
        }
    }
}