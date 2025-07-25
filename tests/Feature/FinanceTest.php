<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Finance;
use App\Models\Vacancy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FinanceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_finance_can_get_all
     * @return void
     */
    public function test_finance_can_get_all(): void
    {
        $response = $this->getJson('/api/v1/finances');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            'id',
                            'type',
                            'client',
                            'vacancy',
                            'amount',
                            'category',
                            'note',
                            'date',
                            'created_at',
                            'updated_at'
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
     * Summary of test_finance_can_show
     * @return void
     */
    public function test_finance_can_show(): void
    {
        $financeId = Finance::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/finances/' . $financeId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'type',
                    'client',
                    'vacancy',
                    'amount',
                    'category',
                    'note',
                    'date',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $this->assertEquals($financeId, $response['data']['id']);
    }

    /**
     * Summary of test_finance_can_create
     * @return void
     */
    public function test_finance_can_create(): void
    {
        $type = 'salary';
        $clientId = Client::inRandomOrder()->first()->id;
        $vacancyId = Vacancy::inRandomOrder()->first()->id;
        $amount = 5000000.00;
        $category = 'engineering';
        $note = 'Monthly salary for July';
        $date = '2025-07-01';

        $data = [
            'type' => $type,
            'client_id' => $clientId,
            'vacancy_id' => $vacancyId,
            'amount' => $amount,
            'category' => $category,
            'note' => $note,
            'date' => $date
        ];

        $response = $this->postJson('/api/v1/finances/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Finance created',
        ]);

        $data['date'] = '2025-07-01 00:00:00';
        $this->assertDatabaseHas('finances', $data);
    }

    /**
     * Summary of test_finance_can_update
     * @return void
     */
    public function test_finance_can_update(): void
    {
        $finance = Finance::inRandomOrder()->first();

        $type = 'salary';
        $clientId = Client::inRandomOrder()->first()->id;
        $vacancyId = Vacancy::inRandomOrder()->first()->id;
        $amount = 6000000.00;
        $category = 'engineering';
        $note = 'Monthly salary for August';
        $date = '2025-08-01';

        $data = [
            'type' => $type,
            'client_id' => $clientId,
            'vacancy_id' => $vacancyId,
            'amount' => $amount,
            'category' => $category,
            'note' => $note,
            'date' => $date
        ];

        $response = $this->putJson('/api/v1/finances/update/' . $finance->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'type',
                    'client',
                    'vacancy',
                    'amount',
                    'category',
                    'note',
                    'date',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $data['id'] = $finance->id;
        $data['date'] = '2025-08-01 00:00:00';
        $this->assertDatabaseHas('finances', $data);
    }

    /**
     * Summary of test_finance_can_delete
     * @return void
     */
    public function test_finance_can_delete(): void
    {
        $financeId = Finance::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/finances/delete/' . $financeId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Finance Deleted',
            ]);

        $this->assertSoftDeleted('finances', [
            'id' => $financeId,
        ]);
    }
}
