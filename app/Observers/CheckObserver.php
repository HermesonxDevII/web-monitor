<?php

namespace App\Observers;

use App\Models\Check;

class CheckObserver
{
    /**
     * Handle the Check "created" event.
     */
    public function created(Check $check): void
    {
        if ($check->isSuccess()) {
            $user = $check->endpoint->site->user;
            $user->notify(new CheckNotification($check));
        }
    }

    /**
     * Handle the Check "updated" event.
     */
    public function updated(Check $check): void
    {
        //
    }

    /**
     * Handle the Check "deleted" event.
     */
    public function deleted(Check $check): void
    {
        //
    }

    /**
     * Handle the Check "restored" event.
     */
    public function restored(Check $check): void
    {
        //
    }

    /**
     * Handle the Check "force deleted" event.
     */
    public function forceDeleted(Check $check): void
    {
        //
    }
}
