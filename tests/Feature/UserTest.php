<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_user_can_get_all
     * @return void
     */
    public function test_user_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/users");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            'id',
                            'first_name',
                            'last_name',
                            'email',
                            'phone',
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
     * Summary of test_user_can_show
     * @return void
     */
    public function test_user_can_show(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $userId = User::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/users/' . $userId);

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
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * Summary of test_user_can_create
     * @return void
     */
    public function test_user_can_create(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $firstName = "Murk";
        $lastName = "Zuckerberg";
        $email = "murk@gmail.com";
        $phone = "998997654382";
        $password = "123456";

        $data = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone' => $phone,
            'password' => $password,
        ];

        $response = $this->postJson('/api/v1/users/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'User created',
        ]);

        $this->assertDatabaseHas('users', [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone' => $phone,
        ]);
    }

    /**
     * Summary of test_user_can_update
     * @return void
     */
    public function test_user_can_update(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $user = User::inRandomOrder()->first();

        $firstName = "Elon";
        $lastName = "Musk";
        $email = "elon@gmail.com";
        $phone = "998997654384";
        $password = "1234567";

        $data = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone' => $phone,
            'password' => $password,
        ];

        $response = $this->putJson('/api/v1/users/update/' . $user->id, $data);

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
                    'created_at',
                    'updated_at',
                ]
            ]);

        $this->assertDatabaseHas('users', [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone' => $phone,
        ]);
    }

    /**
     * Summary of test_user_can_delete
     * @return void
     */
    public function test_user_can_delete(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $userId = User::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/users/delete/' . $userId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'User Deleted',
            ]);

        $this->assertSoftDeleted('users', [
            'id' => $userId,
        ]);
    }
}
