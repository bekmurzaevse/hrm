<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_client_can_get_all
     * @return void
     */
    public function test_client_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/clients");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            "id",
                            "name",
                            "contact_info",
                            "status",
                            "created_by",
                            "created_at",
                            "updated_at"
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
     * Summary of test_client_can_show
     * @return void
     */
    public function test_client_can_show(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $clientId = Client::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/clients/' . $clientId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    "id",
                    "name",
                    "contact_info",
                    "status",
                    "created_by",
                    "created_at",
                    "updated_at"
                ]
            ]);
    }

    /**
     * Summary of test_client_can_create
     * @return void
     */
    public function test_client_can_create(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $name = "Artel";
        $contactInfo = "+998974563241";
        $createdBy = Client::inRandomOrder()->first()->id;

        $data = [
            'name' => $name,
            'contact_info' => $contactInfo,
            'created_by' => $createdBy,
        ];

        $response = $this->postJson('/api/v1/clients/create', $data);

        $client = Client::latest()->first();
        $client->tags()->attach([1,3]);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Client created',
        ]);

        $this->assertDatabaseHas('clients', [
            'name' => $name,
            'contact_info' => $contactInfo,
            'created_by' => $createdBy,
        ]);
    }

    /**
     * Summary of test_client_can_update
     * @return void
     */
    public function test_client_can_update(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $client = Client::inRandomOrder()->first();

        $name = "Acer";
        $contactInfo = "998974563243";
        $createdBy = Client::inRandomOrder()->first()->id;

        $data = [
            'name' => $name,
            'contact_info' => $contactInfo,
            'created_by' => $createdBy,
        ];

        $response = $this->putJson('/api/v1/clients/update/' . $client->id, $data);

        $client->tags()->sync([2,3]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'contact_info',
                    'status',
                    'created_by',
                    'created_at',
                    'updated_at',
                ]
            ]);

        $this->assertDatabaseHas('clients', [
            'name' => $name,
            'contact_info' => $contactInfo,
            'created_by' => $createdBy,
        ]);
    }

    /**
     * Summary of test_client_can_delete
     * @return void
     */
    public function test_client_can_delete(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $clientId = Client::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/clients/delete/' . $clientId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Client Deleted',
            ]);

        $this->assertSoftDeleted('clients', [
            'id' => $clientId,
        ]);
    }
}
