<?php

namespace App\Actions\v1\HrOrder;

use App\Dto\v1\HrOrder\DeleteDto;
use App\Exceptions\ApiResponseException;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class DeleteAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\HrOrder\DeleteDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, DeleteDto $dto): JsonResponse
    {
        try {
            $hrOrder = User::findOrFail($dto->userId)
                ->hrOrders()
                ->where('id', $id)
                ->firstOrFail();

            $filePath = $hrOrder->path;

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            $hrOrder->delete();

            return static::toResponse(
                message: 'Hr Document Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Hr Order Not Found', 404);
        }
    }
}
