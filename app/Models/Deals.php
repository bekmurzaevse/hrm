<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deals extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'stage',
        'value',
        'description',
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
     * Summary of client
     * @return BelongsTo<Client, Deals>
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

}
