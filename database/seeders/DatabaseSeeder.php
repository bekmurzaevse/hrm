<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            ClientSeeder::class,
            DealsSeeder::class,
            InteractionSeeder::class,
            ProjectSeeder::class,
            VacancySeeder::class,
            HrDocumentSeeder::class,
            HrOrderSeeder::class,
        ]);
    }
}
