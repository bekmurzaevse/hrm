<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Finance;
use App\Models\Vacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Finance::create([
            'type' => 'income',
            'client_id' => Client::inRandomOrder()->first()->id,
            'vacancy_id' => Vacancy::inRandomOrder()->first()->id,
            'amount' => 2500000.00,
            'category' => 'salary',
            'note' => 'Monthly salary for July',
            'date' => now()->startOfMonth(),
        ]);

        Finance::create([
            'type' => 'expense',
            'client_id' => Client::inRandomOrder()->first()->id,
            'vacancy_id' => Vacancy::inRandomOrder()->first()->id,
            'amount' => 2000000.00,
            'category' => 'utilities',
            'note' => 'Monthly utilities payment for July',
            'date' => now()->startOfMonth(),
        ]);
    }
}
