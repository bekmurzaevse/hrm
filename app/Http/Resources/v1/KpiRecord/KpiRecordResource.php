<?php

namespace App\Http\Resources\v1\KpiRecord;

use App\Http\Resources\v1\User\UserResource;
use App\Http\Resources\v1\Vacancy\VacancyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KpiRecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'vacancy' => new VacancyResource($this->vacancy),
            'kpi_score' => $this->kpi_score,
            'calculated_at' => $this->calculated_at->format('Y-m-d H:i:s'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
