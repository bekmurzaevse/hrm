<?php

namespace App\Actions\v1\CandidateNote;

use App\Http\Resources\v1\CandidateNote\CandidateNoteCollection;
use App\Models\CandidateNote;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class IndexAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $key = 'candidate_notes:' . app()->getLocale() . ':' . md5(request()->fullUrl());

        $notes = Cache::remember($key, now()->addDay(), function () {
            return CandidateNote::with(['candidate', 'user'])->paginate(10);
        });

        return static::toResponse(
            message: 'Candidate Notes Retrieved',
            data: new CandidateNoteCollection($notes)
        );
    }
}
