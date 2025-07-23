<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_tag_can_get_all
     * @return void
     */
    public function test_tag_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/tags");

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
     * Summary of test_tag_can_show
     * @return void
     */
    public function test_tag_can_show(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $tagId = Tag::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/tags/' . $tagId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ]);
    }

    /**
     * Summary of test_tag_can_create
     * @return void
     */
    public function test_tag_can_create(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $name = "test name";

        $data = [
            'name' => $name,
        ];

        $response = $this->postJson('/api/v1/tags/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Tag created',
        ]);

        $this->assertDatabaseHas('tags', [
            'name' => $name,
        ]);
    }

    /**
     * Summary of test_tags_can_update
     * @return void
     */
    public function test_tags_can_update(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $tag = Tag::inRandomOrder()->first();

        $name = "update test name";

        $data = [
            'name' => $name,
        ];

        $response = $this->putJson('/api/v1/tags/update/' . $tag->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $this->assertDatabaseHas('tags', [
            'name' => $name,
        ]);
    }

    /**
     * Summary of test_tags_can_delete
     * @return void
     */
    public function test_tags_can_delete(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $tagId = Tag::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/tags/delete/' . $tagId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Tag Deleted',
            ]);

        $this->assertDatabaseMissing('tags', [
            'id' => $tagId,
        ]);
    }
}
