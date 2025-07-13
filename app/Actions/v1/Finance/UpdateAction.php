<?php

namespace App\Actions\v1\Finance;

use App\Dto\v1\Finance\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Finance\FinanceResource;
use App\Models\Finance;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Finance\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $data = Finance::findOrFail($id);
            $data->update([
                'type' => $dto->type,
                'client_id' => $dto->clientId,
                'vacancy_id' => $dto->vacancyId,
                'amount' => $dto->amount,
                'category' => $dto->category,
                'note' => $dto->note,
                'date' => $dto->date,
            ]);

            return static::toResponse(
                message: 'Finance Updated',
                data: new FinanceResource($data)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Finance Not Found', 404);
        }
    }
}