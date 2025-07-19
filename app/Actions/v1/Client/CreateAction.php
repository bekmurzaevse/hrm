<?php

namespace App\Actions\v1\Client;

use App\Dto\v1\Client\CreateDto;
use App\Models\Client;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Client\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'name' => $dto->name,
            'contact_info' => $dto->contactInfo,
            'status' => $dto->status,
            'created_by' => $dto->createdBy,
        ];

        $client = Client::create($data);

        if($dto->tags){
            $tags = collect($dto->tags)->unique()->values()->all();

            $client->tags()->attach(
                $tags
            );
        }

        return static::toResponse(
            message: 'Client created'
        );
    }
}
