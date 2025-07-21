<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class HrDocumentTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_hr_document_can_get_all
     * @return void
     */
    public function test_hr_document_can_get_all(): void
    {
        $userId = User::first()->id;

        $response = $this->getJson("/api/v1/hr-documents?user_id=$userId");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            'id',
                            'name',
                            'path',
                            'type',
                            'size',
                            'description',
                            'created_at',
                            'download_url',
                        ]
                    ],
                    'pagination' => [
                        'current_page',
                        'per_page',
                        'last_page',
                        'total'
                    ]
                ]
            ]);
    }

    /**
     * Summary of test_hr_document_can_show
     * @return void
     */
    public function test_hr_document_can_show(): void
    {
        $this->withoutExceptionHandling();
        $user = User::first();
        // $this->actingAs($user);

        $hrDocumentId = User::first()->hrDocuments()->inRandomOrder()->first()->id;

        $response = $this->getJson("/api/v1/hr-documents/$hrDocumentId?user_id=$user->id");

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
     * Summary of test_hr_document_can_create
     * @return void
     */
    public function test_hr_document_can_create(): void
    {
        $this->withoutExceptionHandling();
        $user = User::first();
        // $this->actingAs($user);

        $file = UploadedFile::fake()->create('INN.pdf', 1024, 'application/pdf');

        $data = [
            'user_id' => $user->id,
            'file' => $file,
            'description' => "description",
        ];

        $response = $this->postJson("/api/v1/hr-documents/create", $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'HrDocument created',
        ]);
    }

    /**
     * Summary of test_hr_document_can_update
     * @return void
     */
    public function test_hr_document_can_update(): void
    {
        $user = User::first();
        // $this->actingAs($user);

        $hrDocumentId = User::first()->hrDocuments()->inRandomOrder()->first()->id;

        $file = UploadedFile::fake()->create('newINN.pdf', 1024, 'application/pdf');

        $data = [
            'user_id' => $user->id,
            'file' => $file,
            'description' => "description",
        ];

        $response = $this->putJson('/api/v1/hr-documents/update/' . $hrDocumentId, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);
    }

    /**
     * Summary of test_hr_document_can_delete
     * @return void
     */
    public function test_hr_document_can_delete(): void
    {
        $user = User::first();
        // $this->actingAs($user);

        $hrDocumentId = User::first()->hrDocuments()->inRandomOrder()->first()->id;

        $response = $this->deleteJson("/api/v1/hr-documents/delete/$hrDocumentId?user_id=$user->id");

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Hr Document Deleted',
            ]);

        $this->assertSoftDeleted('files', [
            'id' => $hrDocumentId,
        ]);
    }
}
