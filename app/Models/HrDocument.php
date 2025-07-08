<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class HrDocument extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type',
        'file_url',
        'user_id',
    ];

    /**
     * Summary of casts
     * @return array{created_at: string, updated_at: string}
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Summary of user
     * @return BelongsTo<User, HrDocument>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
