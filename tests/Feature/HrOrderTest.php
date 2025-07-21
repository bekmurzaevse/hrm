<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class HrOrderTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_hr_order_can_get_all
     * @return void
     */
    public function test_hr_order_can_get_all(): void
    {
        $userId = User::first()->id;

        $response = $this->getJson("/api/v1/hr-orders?user_id=$userId");

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
     * Summary of test_hr_order_can_show
     * @return void
     */
    public function test_hr_order_can_show(): void
    {
        $user = User::first();
        // $this->actingAs($user);

        $hrOrderId = User::first()->hrOrders()->inRandomOrder()->first()->id;

        $response = $this->getJson("/api/v1/hr-orders/$hrOrderId?user_id=$user->id");

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
     * Summary of test_hr_order_can_create
     * @return void
     */
    public function test_hr_order_can_create(): void
    {
        $user = User::first();
        // $this->actingAs($user);

        $file = UploadedFile::fake()->create('newMetrika.pdf', 1024, 'application/pdf');

        $data = [
            'user_id' => $user->id,
            'file' => $file,
            'description' => "description",
        ];

        $response = $this->postJson("/api/v1/hr-orders/create", $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'HrOrder created',
        ]);
    }

    /**
     * Summary of test_hr_order_can_update
     * @return void
     */
    public function test_hr_order_can_update(): void
    {
        $user = User::first();
        // $this->actingAs($user);

        $hrOrderId = User::first()->hrOrders()->inRandomOrder()->first()->id;

        $file = UploadedFile::fake()->create('updateMetrika.pdf', 1024, 'application/pdf');

        $data = [
            'user_id' => $user->id,
            'file' => $file,
            'description' => "description",
        ];

        $response = $this->putJson('/api/v1/hr-orders/update/' . $hrOrderId, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);
    }

    /**
     * Summary of test_hr_order_can_delete
     * @return void
     */
    public function test_hr_order_can_delete(): void
    {
        $user = User::first();
        // $this->actingAs($user);

        $hrOrderId = User::first()->hrOrders()->inRandomOrder()->first()->id;

        $response = $this->deleteJson("/api/v1/hr-orders/delete/$hrOrderId?user_id=$user->id");

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Hr Order Deleted',
            ]);

        $this->assertSoftDeleted('files', [
            'id' => $hrOrderId,
        ]);
    }
}
