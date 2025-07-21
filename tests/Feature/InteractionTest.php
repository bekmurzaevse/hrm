<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Interaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InteractionTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_interaction_can_get_all
     * @return void
     */
    public function test_interaction_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/interactions");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            'id',
                            'client',
                            'type',
                            'notes',
                            'date',
                            'user',
                            'description',
                            'created_at',
                            'updated_at',
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
     * Summary of test_interaction_can_show
     * @return void
     */
    public function test_interaction_can_show(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $interactionId = Interaction::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/interactions/' . $interactionId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'client',
                    'type',
                    'notes',
                    'date',
                    'user',
                    'description',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * Summary of test_interaction_can_create
     * @return void
     */
    public function test_interaction_can_create(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $type = "phone";
        $notes = "notes";
        $description = "Deals description";
        $clientId = Client::inRandomOrder()->first()->id;
        $userId = User::inRandomOrder()->first()->id;

        $data = [
            'client_id' => $clientId,
            'type' => $type,
            'notes' => $notes,
            'user_id' => $userId,
            'description' => $description,
        ];

        $response = $this->postJson('/api/v1/interactions/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Interaction created',
        ]);

        $this->assertDatabaseHas('interactions', [
            'client_id' => $clientId,
            'type' => $type,
            'notes' => $notes,
            'user_id' => $userId,
            'description' => $description,
        ]);
    }


    /**
     * Summary of test_interaction_can_update
     * @return void
     */
    public function test_interaction_can_update(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $interaction = Interaction::inRandomOrder()->first();

        $type = "telegram";
        $notes = "new notes";
        $description = "new Deals description";
        $clientId = Client::inRandomOrder()->first()->id;
        $userId = User::inRandomOrder()->first()->id;

        $data = [
            'client_id' => $clientId,
            'type' => $type,
            'notes' => $notes,
            'user_id' => $userId,
            'description' => $description,
        ];

        $response = $this->putJson('/api/v1/interactions/update/' . $interaction->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'client',
                    'type',
                    'notes',
                    'date',
                    'user',
                    'description',
                    'created_at',
                    'updated_at',
                ]
            ]);

        $this->assertDatabaseHas('interactions', [
            'client_id' => $clientId,
            'type' => $type,
            'notes' => $notes,
            'user_id' => $userId,
            'description' => $description,
        ]);
    }


    /**
     * Summary of test_interaction_can_delete
     * @return void
     */
    public function test_interaction_can_delete(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $interactionId = Interaction::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/interactions/delete/' . $interactionId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Interaction Deleted',
            ]);

        $this->assertSoftDeleted('interactions', [
            'id' => $interactionId,
        ]);
    }
}
