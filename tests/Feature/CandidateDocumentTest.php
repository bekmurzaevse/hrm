<?php

namespace Tests\Feature;

use App\Models\Candidate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CandidateDocumentTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_candidate_documents_can_get_all
     * @return void
     */
    public function test_candidate_documents_can_get_all(): void
    {
        $candidateId = Candidate::has('documents')->inRandomOrder()->first()->id;

        $response = $this->getJson("/api/v1/candidate-documents?candidate_id={$candidateId}");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items',
                    'pagination' => [
                        'current_page',
                        'per_page',
                        'last_page',
                        'total',
                    ]
                ]
            ]);
    }

    /**
     * Summary of test_candidate_documents_can_show
     * @return void
     */
    public function test_candidate_documents_can_show(): void
    {
        $candidate = Candidate::has('documents')->inRandomOrder()->first();
        $document = $candidate->documents()->inRandomOrder()->first();

        $response = $this->getJson("/api/v1/candidate-documents/{$document->id}?candidate_id={$candidate->id}");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'path',
                    'type',
                    'size',
                    'description',
                    'created_at',
                    'download_url',
                ]
            ]);
    }

    /**
     * Summary of test_candidate_documents_can_download
     * @return void
     */
    public function test_candidate_documents_can_create(): void
    {
        $candidate = Candidate::inRandomOrder()->first();

        $file = UploadedFile::fake()->create('document.pdf', 1024, 'application/pdf');

        $data = [
                'name' => 'Test Document',
                'file' => $file,
                'type' => 'candidate_document',
                'candidate_id' => $candidate->id,
                'description' => 'Test document description',
                ];

                $response = $this->postJson("/api/v1/candidate-documents/create", $data);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Candidate Document Created',
            ]);
    }

    /**
     * Summary of test_candidate_documents_can_update
     * @return void
     */
    public function test_candidate_documents_can_update(): void
    {
        $candidate = Candidate::has('documents')->inRandomOrder()->firstOrFail();

        $docuement = $candidate->documents()->inRandomOrder()->first();

        $this->assertNotNull($docuement, 'Candidate does not have any documents');
        $documentId = $docuement->id;

        $file = UploadedFile::fake()->create('update.pdf', 1024, 'application/pdf');

        $data = [
            'candidate_id' => $candidate->id,
            'file' => $file,
        ];

        $response = $this->putJson("/api/v1/candidate-documents/update/{$documentId}", $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);
    }

    /**
     * Summary of test_candidate_documents_can_delete
     * @return void
     */
    public function test_candidate_documents_can_delete(): void
    {
        $candidate = Candidate::has('documents')->inRandomOrder()->firstOrFail();
        $document = $candidate->documents()->inRandomOrder()->first();

        $this->assertNotNull($document, 'Candidate does not have any documents');
        $docuemntId = $document->id;

        $response = $this->deleteJson("/api/v1/candidate-documents/delete/{$docuemntId}?candidate_id={$candidate->id}");

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Candidate Document Deleted',
            ]);

        $this->assertSoftDeleted('files', [
            'id' => $docuemntId,
        ]);
    }
}