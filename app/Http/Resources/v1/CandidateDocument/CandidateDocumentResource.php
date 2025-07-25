<?php

namespace App\Http\Resources\v1\CandidateDocument;

use App\Http\Resources\v1\Candidate\CandidateResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CandidateDocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $fileExists = Storage::disk('public')->exists($this->path);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'path' => $this->path,
            'type' => $this->type,
            'size' => $fileExists ? round(Storage::disk('public')->size($this->path) / 1024, 2) . " KB" : null,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'download_url' => $fileExists ? url('/api/v1/candidate-document/download/' . $this->id) : null,
        ];
    }
}