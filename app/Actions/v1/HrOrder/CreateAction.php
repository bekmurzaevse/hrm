<?php

namespace App\Actions\v1\HrOrder;

use App\Dto\v1\HrOrder\CreateDto;
use App\Helpers\FileUploadHelper;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\HrOrder\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $file = $dto->file;
        $path = FileUploadHelper::file($file, 'hr_orders');

        User::firstOrFail()->hrOrders()->create([
            'name' => $dto->name,
            'path' => $path,
            'type' => 'hr_order',
            'size' => $file->getSize(),
            'description' => $dto->description ?? null,
        ]);

        return static::toResponse(
            message: 'HrOrder created'
        );
    }
}
