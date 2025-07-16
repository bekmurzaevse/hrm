<?php

namespace App\Http\Resources\v1\FunnelLog;

use App\Http\Resources\v1\Application\ApplicationResource;
use App\Http\Resources\v1\RecruitmentFunnelStage\RecruitmentFunnelStageResource;
use App\Http\Resources\v1\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FunnelLogResource extends JsonResource
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
            'application' => new ApplicationResource($this->application),
            'stage' => new RecruitmentFunnelStageResource($this->stage),
            'moved_by' => new UserResource($this->movedBy),
            'moved_at' => $this->moved_at->format('Y-m-d H:i:s'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
