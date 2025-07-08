<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacancy extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'requirements',
        'salary',
        'deadline',
        'recruiter_id',
        'project_id',
        'status',
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
     * Summary of recruiter
     * @return BelongsTo<User, Vacancy>
     */
    public function recruiter(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Summary of project
     * @return BelongsTo<User, Vacancy>
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
