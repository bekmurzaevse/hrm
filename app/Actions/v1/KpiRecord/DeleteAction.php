<?php

namespace App\Actions\v1\KpiRecord;

use App\Exceptions\ApiResponseException;
use App\Models\KpiRecord;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DeleteAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try {
            $data = KpiRecord::findOrFail($id);
            $data->delete();

            return static::toResponse(
                message: 'Kpi Record Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Kpi Record Not Found', 404);
        }
    }
}