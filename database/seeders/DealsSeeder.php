<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Deals;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Deals::create([
            'client_id' => Client::inRandomOrder()->first()->id,
            'value' => rand(1300, 2500),
            'description' => "Description",
        ]);
        
        Deals::create([
            'client_id' => Client::inRandomOrder()->first()->id,
            'value' => rand(1300, 2500),
            'description' => "Description",
        ]);
    }
}
