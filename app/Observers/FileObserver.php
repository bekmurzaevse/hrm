<?php

namespace App\Observers;

use App\Models\File;
use App\Traits\ClearCache;

class FileObserver
{
    use ClearCache;

    /**
     * Summary of created
     * @return void
     */
    public function created(File $file): void
    {
        $type = $file->type;

        if ($type == 'hr_document') {
            $this->clear([
                'hr_documents',
                'hr_documents:show',
            ]);
        } elseif ($type == 'hr_order') {
            $this->clear([
                'hr_orders',
                'hr_orders:show',
            ]);
        }
    }

    /**
     * Summary of updated
     * @return void
     */
    public function updated(File $file): void
    {
        $type = $file->type;

        if ($type == 'hr_document') {
            $this->clear([
                'hr_documents',
                'hr_documents:show',
            ]);
        } elseif ($type == 'hr_order') {
            $this->clear([
                'hr_orders',
                'hr_orders:show',
            ]);
        }
    }

    /**
     * Summary of deleted
     * @return void
     */
    public function deleted(File $file): void
    {
        $type = $file->type;

        if ($type == 'hr_document') {
            $this->clear([
                'hr_documents',
                'hr_documents:show',
            ]);
        } elseif ($type == 'hr_order') {
            $this->clear([
                'hr_orders',
                'hr_orders:show',
            ]);
        }
    }

    /**
     * Summary of restored
     * @return void
     */
    public function restored(File $file): void
    {
        $type = $file->type;

        if ($type == 'hr_document') {
            $this->clear([
                'hr_documents',
                'hr_documents:show',
            ]);
        } elseif ($type == 'hr_order') {
            $this->clear([
                'hr_orders',
                'hr_orders:show',
            ]);
        }
    }

    /**
     * Summary of forceDeleted
     * @return void
     */
    public function forceDeleted(File $file): void
    {
        $type = $file->type;

        if ($type == 'hr_document') {
            $this->clear([
                'hr_documents',
                'hr_documents:show',
            ]);
        } elseif ($type == 'hr_order') {
            $this->clear([
                'hr_orders',
                'hr_orders:show',
            ]);
        }
    }
}
