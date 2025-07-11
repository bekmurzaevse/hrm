<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'type',
        'generated_by',
        'file_path',
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
     * Summary of generatedBy
     * @return BelongsTo<User, Report>
     */
    public function generatedBy(): BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'generated_by');
    }   
}
