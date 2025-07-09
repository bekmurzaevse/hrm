<?php

namespace App\Http\Resources\v1\Vacancy;

use App\Http\Resources\v1\Project\ProjectResource;
use App\Http\Resources\v1\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacancyResource extends JsonResource
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
            'title' => $this->title,
            'requirements' => $this->requirements,
            'salary' => $this->salary,
            'deadline' => $this->deadline,
            'status' => $this->status,
            'recruiter' => new UserResource($this->recruiter),
            'project' => new ProjectResource($this->project),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
