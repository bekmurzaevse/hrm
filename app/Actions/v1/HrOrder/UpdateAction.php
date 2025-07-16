<?php

namespace App\Actions\v1\HrOrder;

use App\Dto\v1\HrOrder\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Helpers\FileUploadHelper;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\HrOrder\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $hrOrder = User::firstOrFail()->hrOrders()->where('id', $id)->firstOrFail();

            $file = $dto->file;
            $filePath = $hrOrder->path;

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            $path = FileUploadHelper::file($file, 'hr_orders');

            User::firstOrFail()->hrOrders()->where('id', $id)->update([
                    'name' => $dto->name,
                    'path' => $path,
                    'type' => 'hr_document',
                    'size' => $file->getSize(),
                    'description' => $dto->description ?? null,
                ]);

            return static::toResponse(
                message: 'HrOrder Updated',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('HrOrder Not Found', 404);
        }
    }
}
