<?php

namespace App\Http\Resources\v1\Finance;

use App\Http\Resources\v1\Client\ClientResource;
use App\Http\Resources\v1\Vacancy\VacancyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FinanceResource extends JsonResource
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
            'type' => $this->type,
            'client' => new ClientResource($this->client),
            'vacancy' => new VacancyResource($this->vacancy),
            'amount' => $this->amount,
            'category' => $this->category,
            'note' => $this->note,
            'date' => $this->date->format('Y-m-d'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
