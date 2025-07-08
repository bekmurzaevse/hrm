<?php 

namespace App\Actions\v1\Interaction;

use App\Dto\v1\Interaction\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Interaction\InteractionResource;
use App\Models\Interaction;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;
    
    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Interaction\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $interaction = Interaction::with(['client', 'user'])->findOrFail($id);
            $interaction->update([
                'client_id' => $dto->clientId,
                'type' => $dto->type,
                'notes' => $dto->notes,
                'user_id' => $dto->userId,
                'description' => $dto->description ?? $interaction->description,
            ]);

            return static::toResponse(
                message: 'Interaction Updated',
                data: new InteractionResource($interaction)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Interaction Not Found', 404);
        }
    }
}