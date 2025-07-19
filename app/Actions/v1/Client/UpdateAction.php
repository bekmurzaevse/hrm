<?php

namespace App\Actions\v1\Client;

use App\Dto\v1\Client\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Client\ClientResource;
use App\Models\Client;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Client\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $client = Client::with(['createdBy'])->findOrFail($id);
            $client->update([
                'name' => $dto->name,
                'contact_infp' => $dto->contactInfo,
                'status' => $dto->status ?? $client->status,
                'created_by' => $dto->createdBy,
            ]);

            if($dto->tags){
                $tags = collect($dto->tags)->unique()->values()->all();

                $client->tags()->sync($tags);
            }

            return static::toResponse(
                message: 'Client Updated',
                data: new ClientResource($client)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Client Not Found', 404);
        }
    }
}
