<?php

namespace App\Actions\v1\Candidate;

use App\Dto\v1\Candidate\CreateDto;
use App\Helpers\FileUploadHelper;
use App\Models\Candidate;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Candidate\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'first_name' => $dto->firstName,
            'last_name' => $dto->lastName,
            'email' => $dto->email,
            'phone' => $dto->phone,
            'education' => $dto->education,
            'experience' => $dto->experience,
            'status' => $dto->status,
        ];

        $candidate = Candidate::create($data);
        $photo = $dto->photo;
        $path = FileUploadHelper::file($photo, 'photo');

        $candidate->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $photo->getSize(),
        ]);

        return static::toResponse(
            message: 'Candidate created'
        );
    }
}