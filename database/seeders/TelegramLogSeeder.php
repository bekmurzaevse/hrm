<?php

namespace Database\Seeders;

use App\Models\TelegramLog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TelegramLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TelegramLog::create([
            'user_id' => User::inRandomOrder()->first()->id,
            'action' => 'User logged in',
            'message' => 'User successfully logged in to the system.',
            'chat_id' => '123456789',
            'message_id' => '987654321',
            'message_type' => 'text',
            'sent_at' => now(),
        ]);


        TelegramLog::create([
            'user_id' => User::inRandomOrder()->first()->id,
            'action' => 'System notification',
            'message' => 'Scheduled maintenance will occur at midnight.',
            'chat_id' => '23456789',
            'message_id' => '237654321',
            'message_type' => 'text',
            'sent_at' => now(),
        ]);
    }
}
