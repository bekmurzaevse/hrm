<?php

namespace App\Http\Resources\v1\Report;

use App\Http\Resources\v1\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $fileExists = Storage::disk('public')->exists($this->file_path);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'generated_by' => new UserResource($this->generatedBy),
            'file_download_url' => $fileExists ? url('/api/v1/reports/download/' . $this->id) : null,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
