<?php 

namespace App\Actions\v1\Interaction;

use App\Dto\v1\Interaction\CreateDto;
use App\Models\Interaction;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;
    
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'client_id' => $dto->clientId,
            'type' => $dto->type,
            'notes' => $dto->notes,
            'user_id' => $dto->userId,
            'description' => $dto->description,
        ];

        Interaction::create($data);

        return static::toResponse(
            message: 'Interaction created'
        );
    }
}