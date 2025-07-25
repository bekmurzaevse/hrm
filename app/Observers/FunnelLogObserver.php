<?php

namespace App\Observers;

use App\Traits\ClearCache;

class FunnelLogObserver
{
    use ClearCache;

    /**
     * Summary of created
     * @return void
     */
    public function created(): void
    {
        $this->clear([
            'funnel_logs',
            'funnel_logs:show',
        ]);
    }

    /**
     * Summary of updated
     * @return void
     */
    public function updated(): void
    {
        $this->clear([
            'funnel_logs',
            'funnel_logs:show',
        ]);
    }

    /**
     * Summary of deleted
     * @return void
     */
    public function deleted(): void
    {
        $this->clear([
            'funnel_logs',
            'funnel_logs:show',
        ]);
    }

    /**
     * Summary of restored
     * @return void
     */
    public function restored(): void
    {
        $this->clear([
            'funnel_logs',
            'funnel_logs:show',
        ]);
    }

    /**
     * Summary of forceDeleted
     * @return void
     */
    public function forceDeleted(): void
    {
        $this->clear([
            'funnel_logs',
            'funnel_logs:show',
        ]);
    }
}
