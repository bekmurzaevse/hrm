<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client1 = Client::create([
            'name' => 'Google',
            'contact_info' => '998977654321',
            'status' => 'active',
            'created_by' => 1,
        ]);

        $client1->tags()->attach([1,2]);

        $client2 = Client::create([
            'name' => 'Facebook',
            'contact_info' => '998996543217',
            'status' => 'active',
            'created_by' => 1,
        ]);

        $client2->tags()->attach([2,4]);
    }
}
