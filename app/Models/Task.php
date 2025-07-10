<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'assigned_to',
        'title',
        'description',
        'due_date',
        'status',
        'created_by'
    ];

    /**
     * Summary of casts
     * @return array{created_at: string, updated_at: string, due_date: string}
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'due_date' => 'datetime',
        ];
    }

    /**
     * Summary of assignedTo
     * @return BelongsTo<User, Task>
     */
    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'assigned_to');
    }

    /**
     * Summary of createdBy
     * @return BelongsTo<User, Task>
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'created_by');
    }   
}
