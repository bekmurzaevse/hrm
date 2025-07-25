<?php

namespace App\Http\Resources\v1\Application;

use App\Http\Resources\v1\Candidate\CandidateResource;
use App\Http\Resources\v1\RecruitmentFunnelStage\RecruitmentFunnelStageResource;
use App\Http\Resources\v1\Vacancy\VacancyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
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
            'candidate' => new CandidateResource($this->candidate),
            'vacancy' => new VacancyResource($this->vacancy),
            'current_stage' => new RecruitmentFunnelStageResource($this->currentStage),
            'applied_at' => $this->applied_at->format('Y-m-d'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
