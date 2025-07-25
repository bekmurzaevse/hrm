<?php

namespace App\Observers;

use App\Traits\ClearCache;

class RecruitmentFunnelStageObserver
{
    use ClearCache;

    /**
     * Summary of created
     * @return void
     */
    public function created(): void
    {
        $this->clear([
            'recruitment_funnel_stages',
            'recruitment_funnel_stages:show',
        ]);
    }

    /**
     * Summary of updated
     * @return void
     */
    public function updated(): void
    {
        $this->clear([
            'recruitment_funnel_stages',
            'recruitment_funnel_stages:show',
        ]);
    }

    /**
     * Summary of deleted
     * @return void
     */
    public function deleted(): void
    {
        $this->clear([
            'recruitment_funnel_stages',
            'recruitment_funnel_stages:show',
        ]);
    }

    /**
     * Summary of restored
     * @return void
     */
    public function restored(): void
    {
        $this->clear([
            'recruitment_funnel_stages',
            'recruitment_funnel_stages:show',
        ]);
    }

    /**
     * Summary of forceDeleted
     * @return void
     */
    public function forceDeleted(): void
    {
        $this->clear([
            'recruitment_funnel_stages',
            'recruitment_funnel_stages:show',
        ]);
    }
}
