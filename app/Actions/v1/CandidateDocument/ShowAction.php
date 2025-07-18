<?php

namespace App\Actions\v1\CandidateDocument;

use App\Dto\v1\CandidateDocument\ShowDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\CandidateDocument\CandidateDocumentResource;
use App\Models\Candidate;
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
    public function __invoke(int $id, ShowDto $dto): JsonResponse
    {
        //dd($id, $dto->candidateId);//
        try {
            $key = 'candidate_documents:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $doc = Cache::remember($key, now()->addDay(), function () use ($id, $dto) {
                return Candidate::findOrFail($dto->candidateId)->documents()->where('id', $id,)->firstOrFail();
            });
            
            return static::toResponse(
                message: 'Candidate Document alindi',
                data: new CandidateDocumentResource($doc)
            );

        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Document Not Found', 404);
        }
    }
}