<?php

namespace App\Http\Resources\v1\RecruitmentFunnelStage;

use App\Http\Resources\v1\Vacancy\VacancyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecruitmentFunnelStageResource extends JsonResource
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
            'vacancy' => new VacancyResource($this->vacancy),
            'stage_name' => $this->stage_name,
            'order' => $this->order,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
