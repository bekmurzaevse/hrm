<?php

namespace App\Http\Resources\v1\CandidateNote;

use App\Http\Resources\v1\Candidate\CandidateResource;
use App\Http\Resources\v1\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidateNoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'candidate' => new CandidateResource($this->candidate),
            'user'      => new UserResource($this->user),
            'note'         => $this->note,
            'created_at'   => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at'   => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}