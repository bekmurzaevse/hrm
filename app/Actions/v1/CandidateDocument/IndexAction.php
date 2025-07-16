<?php

namespace App\Actions\v1\CandidateDocument;

use App\Http\Resources\v1\CandidateDocument\CandidateDocumentCollection;
use App\Models\Candidate;
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
        $key = 'candidate_documents:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $docs = Cache::remember($key, now()->addDay(), function () {
            return Candidate::firstOrFail()->documents()->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new CandidateDocumentCollection($docs)
        );
    }
}