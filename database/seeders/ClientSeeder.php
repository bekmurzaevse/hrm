<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'name' => 'Google',
            'contact_info' => '998977654321',
            'status' => 'active',
            'created_by' => 1,
        ]);
        
        Client::create([
            'name' => 'Facebook',
            'contact_info' => '998996543217',
            'status' => 'active',
            'created_by' => 1,
        ]);
    }
}
