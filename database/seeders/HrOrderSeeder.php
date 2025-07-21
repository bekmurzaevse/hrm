<?php

namespace Database\Seeders;

use App\Helpers\FileUploadHelper;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class HrOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = UploadedFile::fake()->create('Metrika.pdf', 1024, 'application/pdf');

        $path = FileUploadHelper::file($file, 'hr_orders');

        $user = User::first();

        $user->hrOrders()->create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
            'type' => 'hr_order',
            'size' => $file->getSize(),
            'description' => $dto->description ?? null,
        ]);

    }
}
