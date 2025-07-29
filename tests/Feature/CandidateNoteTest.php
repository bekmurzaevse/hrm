<?php

namespace Tests\Feature;

use App\Models\Candidate;
use App\Models\CandidateNote;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CandidateNoteTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_candidate_notes_can_get_all
     * @return void
     */
    public function test_candidate_notes_can_get_all(): void
    {

        $response = $this->getJson("/api/v1/candidate-notes");

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
     * Summary of test_candidate_notes_can_show
     * @return void
     */
    public function test_candidate_notes_can_show(): void
    {
        $noteId = CandidateNote::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/candidate-notes/' . $noteId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'candidate',
                    'user',
                    'note',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * Summary of test_candidate_notes_can_get_by_candidate_id
     * @return void
     */
    public function test_candidate_notes_can_create(): void
    {
        $candidate = Candidate::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();

        $data = [
            'candidate_id' => $candidate->id,
            'user_id' => $user->id,
            'note' => 'Test note',
        ];

        $response = $this->postJson('/api/v1/candidate-notes/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Candidate Note Created Successfully',
        ]);
    }

    /**
     * Summary of test_candidate_notes_can_update
     * @return void
     */
    public function test_candidate_notes_can_update(): void
    {
        $noteId = CandidateNote::inRandomOrder()->first()->id;
        $candidate = Candidate::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();

        $data = [
            'candidate_id' => $candidate->id,
            'user_id' => $user->id,
        ];

        $response = $this->putJson('/api/v1/candidate-notes/update/' . $noteId, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'candidate',
                    'user',
                    'note',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * Summary of test_candidate_notes_can_delete
     * @return void
     */
    public function test_candidate_notes_can_delete(): void
    {
        $noteId = CandidateNote::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/candidate-notes/delete/' . $noteId);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => "$noteId - id li Candidate Note o'shirildi",
        ]);

    }
}