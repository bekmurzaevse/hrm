<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TelegramLog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'action',
        'message',
        'chat_id',
        'message_id',
        'message_type',
        'sent_at',
    ];

    /**
     * Summary of casts
     * @return array{created_at: string, updated_at: string, sent_at: string}
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'sent_at' => 'datetime',
        ];
    }

    /**
     * Summary of user
     * @return BelongsTo<User, TelegramLog>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'user_id');
    }
}
