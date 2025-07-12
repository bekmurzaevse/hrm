<?php

namespace App\Http\Resources\v1\TestResult;

use App\Http\Resources\v1\Test\TestResource;
use App\Http\Resources\v1\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'test' => new TestResource($this->test),
            'user' => new UserResource($this->user),
            'score' => $this->score,
            'taken_at' => $this->taken_at->format('Y-m-d H:i:s'),
        ];
    }
}