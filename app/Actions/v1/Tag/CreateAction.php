<?php

namespace App\Actions\v1\Tag;

use App\Dto\v1\Tag\CreateDto;
use App\Models\Tag;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Tag\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'name' => $dto->name,
        ];

        Tag::create($data);

        return static::toResponse(
            message: 'Interaction created'
        );
    }
}
