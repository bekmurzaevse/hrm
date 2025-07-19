<?php

namespace App\Actions\v1\CandidateNote;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\CandidateNote\CandidateNoteResource;
use App\Models\CandidateNote;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class ShowAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try {
            $key = 'candidate_notes:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());

            $note = Cache::remember($key, now()->addDay(), function () use ($id) {
                return CandidateNote::with(['candidate', 'user'])->findOrFail($id);
            });

            return static::toResponse(
                message: "$id - id li Candidate Note alindi",
                data: new CandidateNoteResource($note)
            );
        } catch (ModelNotFoundException) {
            throw new ApiResponseException('Candidate Note Not Found', 404);
        }
    }
}
