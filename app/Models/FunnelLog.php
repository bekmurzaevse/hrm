<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FunnelLog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'application_id',
        'stage_id',
        'moved_at',
        'moved_by',
    ];

    /**
     * Summary of casts
     * @return array{created_at: string, moved_at: string, updated_at: string}
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'moved_at' => 'datetime',
        ];      
    }

    /**
     * Summary of movedBy
     * @return BelongsTo<User, FunnelLog>
     */
    public function movedBy(): BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'moved_by');
    }

    /**
     * Summary of application
     * @return BelongsTo<Application, FunnelLog>
     */
    public function application(): BelongsTo
    {
        return $this->belongsTo(related: Application::class, foreignKey: 'application_id');
    }

    /**
     * Summary of stage
     * @return BelongsTo<RecruitmentFunnelStage, FunnelLog>
     */
    public function stage(): BelongsTo
    {
        return $this->belongsTo(related: RecruitmentFunnelStage::class, foreignKey: 'stage_id');
    }
}
