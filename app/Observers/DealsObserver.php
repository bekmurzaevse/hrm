<?php

namespace App\Observers;

use App\Traits\ClearCache;

class DealsObserver
{
    use ClearCache;

    /**
     * Summary of created
     * @return void
     */
    public function created(): void
    {
        $this->clear([
            'deals',
            'deals:show',
        ]);
    }

    /**
     * Summary of updated
     * @return void
     */
    public function updated(): void
    {
        $this->clear([
            'deals',
            'deals:show',
        ]);
    }

    /**
     * Summary of deleted
     * @return void
     */
    public function deleted(): void
    {
        $this->clear([
            'deals',
            'deals:show',
        ]);
    }

    /**
     * Summary of restored
     * @return void
     */
    public function restored(): void
    {
        $this->clear([
            'deals',
            'deals:show',
        ]);
    }

    /**
     * Summary of forceDeleted
     * @return void
     */
    public function forceDeleted(): void
    {
        $this->clear([
            'deals',
            'deals:show',
        ]);
    }
}
