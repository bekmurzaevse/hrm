<?php

namespace Tests\Feature;

use App\Models\Candidate;
use App\Models\File;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CandidateTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_candidate_can_get_all
     * @return void
     */
    public function test_candidate_can_get_all(): void
    {
        $response = $this->getJson("api/v1/candidates/");

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
     * Summary of test_candidate_can_show
     * @return void
     */
    public function test_candidate_can_show(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $candidateId = Candidate::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/candidates/' . $candidateId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'first_name',
                    'last_name',
                    'email',
                    'phone',
                    'education',
                    'experience',
                    'status',
                    'created_at',
                    'updated_at',
                    'photo' => [
                        'id',
                        'name',
                        'path',
                        'type',
                        'size',
                        'description',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    /**
     * Summary of test_candidate_can_get_by_id
     * @return void
     */
    public function test_candidate_can_be_created(): void
    {
        $photo = UploadedFile::fake()->image('photo.jpg');

        $payload = [
            'first_name' => 'Ali',
            'last_name' => 'Karimov',
            'email' => 'ali@example.com',
            'phone' => '998911234567',
            'education' => 'Bachelor',
            'experience' => '2 years',
            'status' => 'active',
            'photo' => $photo,
        ];

        $response = $this->postJson('api/v1/candidates/create', $payload);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('candidates', [
            'first_name' => 'Ali',
            'last_name' => 'Karimov',
            'email' => 'ali@example.com',
        ]);
    }

    /**
     * Summary of test_candidate_can_update
     * @return void
     */
    public function test_candidate_can__updated_with_new_photo(): void
    {
        Storage::fake('public');

        $candidate = Candidate::inRandomOrder()->first();

        $photo = $candidate->photo()->create([
            'name' => 'old_photo.jpg',
            'path' => 'photo/old_photo.jpg',
            'type' => 'candidate_photo',
            'size' => 1024,
        ]);

        Storage::disk('public')->put('photo/old_photo.jpg', 'fake content');

        $newPhoto = UploadedFile::fake()->image('new_photo.jpg');

        $payload = [
            'first_name' => 'Updated',
            'last_name' => 'Name',
            'email' => 'updated@example.com',
            'phone' => '998901234567',
            'education' => 'Master',
            'experience' => '5 years',
            'status' => 'active',
            'photo' => $newPhoto,
        ];

        $response = $this->putJson("/api/v1/candidates/update/{$candidate->id}", $payload);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'message' => "{$candidate->id} - id li candidate jan'alandi",
        ]);

        $this->assertDatabaseHas('candidates', [
            'id' => $candidate->id,
            'first_name' => 'Updated',
            'email' => 'updated@example.com',
        ]);

        $this->assertDatabaseHas('files', [
            'fileable_id' => $candidate->id,
            'name' => 'new_photo.jpg',
        ]);

    }

    /**
     * Summary of test_candidate_can_delete
     * @return void
     */
    public function test_candidate_can_be_deleted(): void
    {
        $candidate = Candidate::inRandomOrder()->first();

        $response = $this->deleteJson("/api/v1/candidates/delete/{$candidate->id}");

        $response->assertStatus(200)
            ->assertJsonFragment([
                'message' => "{$candidate->id} - id li candidate o'chirildi",
            ]);
    }
}