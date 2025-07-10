<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class KpiRecord extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'vacancy_id',
        'kpi_score',
        'calculated_at'
    ];

    /**
     * Summary of casts
     * @return array{created_at: string, updated_at: string, calculated_at: string}
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'calculated_at' => 'datetime',
        ];
    }

    /**
     * Summary of user
     * @return BelongsTo<User, KpiRecord>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'user_id');
    }

    /**
     * Summary of vacancy
     * @return BelongsTo<Vacancy, KpiRecord>
     */
    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(related: Vacancy::class, foreignKey: 'vacancy_id');
    }
}
