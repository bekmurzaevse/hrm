<?php

namespace App\Models;

use App\Models\funnelLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecruitmentFunnelStage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'vacancy_id',
        'stage_name',
        'order'
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
     * Summary of vacancy
     * @return BelongsTo<Vacancy, RecruitmentFunnelStage>
     */
    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(related: Vacancy::class, foreignKey: 'vacancy_id');
    }

    /**
     * Summary of funnelLogs
     * @return HasMany<FunnelLog, RecruitmentFunnelStage>
     */
    public function funnelLogs(): HasMany
    {
        return $this->HasMany(related: FunnelLog::class, foreignKey: 'stage_id');
    }

    /**
     * Summary of applications
     * @return HasMany<Application, RecruitmentFunnelStage>
     */
    public function applications(): HasMany
    {
        return $this->hasMany(related: Application::class, foreignKey: 'current_stage');
    }
}
