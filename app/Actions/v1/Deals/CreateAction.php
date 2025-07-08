<?php 

namespace App\Actions\v1\Deals;

use App\Dto\v1\Deals\CreateDto;
use App\Models\Deals;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;
    
    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Deals\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'client_id' => $dto->clientId,
            'stage' => $dto->stage,
            'value' => $dto->value,
            'description' => $dto->description,
        ];

        Deals::create($data);

        return static::toResponse(
            message: 'Deals created'
        );
    }
}