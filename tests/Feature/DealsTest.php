<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Deals;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DealsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_deals_can_get_all
     * @return void
     */
    public function test_deals_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/deals");

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
                            'stage',
                            'value',
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
     * Summary of test_deals_can_show
     * @return void
     */
    public function test_deals_can_show(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $dealsId = Deals::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/deals/' . $dealsId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'client',
                    'stage',
                    'value',
                    'description',
                    'created_at',
                    'updated_at'
                ]
            ]);
    }

    /**
     * Summary of test_deals_can_create
     * @return void
     */
    public function test_deals_can_create(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $stage = "lead";
        $description = "Deals description";
        $value = 1200;
        $clientId = Client::inRandomOrder()->first()->id;

        $data = [
            'client_id' => $clientId,
            'stage' => $stage,
            'value' => $value,
            'description' => $description,
        ];

        $response = $this->postJson('/api/v1/deals/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Deals created',
        ]);

        $this->assertDatabaseHas('deals', [
            'client_id' => $clientId,
            'stage' => $stage,
            'value' => $value,
            'description' => $description,
        ]);
    }


    /**
     * Summary of test_deals_can_update
     * @return void
     */
    public function test_deals_can_update(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $deals = Deals::inRandomOrder()->first();

        // $stage = "lead";
        $description = "new Deals description";
        $value = 2300;
        $clientId = Client::inRandomOrder()->first()->id;

        $data = [
            'client_id' => $clientId,
            'value' => $value,
            'description' => $description,
        ];

        $response = $this->putJson('/api/v1/deals/update/' . $deals->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'client',
                    'stage',
                    'value',
                    'description',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $this->assertDatabaseHas('deals', [
            'client_id' => $clientId,
            'value' => $value,
            'description' => $description,
        ]);
    }


    /**
     * Summary of test_deals_can_delete
     * @return void
     */
    public function test_deals_can_delete(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $dealsId = Deals::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/deals/delete/' . $dealsId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Deals Deleted',
            ]);

        $this->assertSoftDeleted('deals', [
            'id' => $dealsId,
        ]);
    }
}
