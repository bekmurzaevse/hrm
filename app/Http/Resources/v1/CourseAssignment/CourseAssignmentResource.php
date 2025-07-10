<?php

namespace App\Http\Resources\v1\CourseAssignment;

use App\Http\Resources\v1\Course\CourseResource;
use App\Http\Resources\v1\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseAssignmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'course' => new CourseResource ($this->course),
            'user' => new UserResource ($this->user),
            'assigned_at' => $this->assigned_at?->format('Y-m-d H:i:s'),
            'completed_at' => $this->completed_at?->format('Y-m-d H:i:s'),
            'certificate_url' => $this->certificate_url,
        ];
    }
}