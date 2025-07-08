<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Interaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InteractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Interaction::create([
            'client_id' => Client::inRandomOrder()->first()->id,
            'type' => 'phone',
            'notes' => '',
            // 'date' => now(),
            'user_id' => 1,
            'description' => 'Description',
        ]);
        
        Interaction::create([
            'client_id' => Client::inRandomOrder()->first()->id,
            'type' => 'telegram',
            'notes' => '',
            // 'date' => now(),
            'user_id' => 1,
            'description' => 'Description',
        ]);
    }
}
