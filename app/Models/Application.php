<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'candidate_id',
        'vacancy_id',
        'current_stage',
        'applied_at',
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
            'applied_at' => 'date',
        ];
    }

    /**
     * Summary of vacancy
     * @return BelongsTo<Vacancy, Application>
     */
    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(related: Vacancy::class, foreignKey: 'vacancy_id');
    }

    /**
     * Summary of candidate
     * @return BelongsTo<Candidate, Application>
     */
    public function candidate(): BelongsTo
    {
        return $this->belongsTo(related: Candidate::class, foreignKey: 'candidate_id');
    }

    /**
     * Summary of currentStage
     * @return BelongsTo<RecruitmentFunnelStage, Application>
     */
    public function currentStage(): BelongsTo
    {
        return $this->belongsTo(related: RecruitmentFunnelStage::class, foreignKey: 'current_stage');
    }

    /**
     * Summary of funnelLog
     * @return HasMany<FunnelLog, Application>
     */
    public function funnelLog(): HasMany
    {
        return $this->hasMany(related: FunnelLog::class, foreignKey: 'application_id');
    }
}
